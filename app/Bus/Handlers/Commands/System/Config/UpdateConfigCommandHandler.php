<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Handlers\Commands\System\Config;

use CachetHQ\Cachet\Bus\Commands\System\Config\UpdateConfigCommand;
use CachetHQ\Cachet\Bus\Exceptions\Setting\InvalidSettingValueException;
use Dotenv\Dotenv;
use Illuminate\Filesystem\Filesystem;

/**
 * This is the update config command handler class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class UpdateConfigCommandHandler
{
    /**
     * @var string
     */
    protected $dir;

    /**
     * @var string
     */
    protected $file;

    /**
     * @var string
     */
    protected $path;

    public function __construct(Filesystem $filesystem)
    {
        $this->dir = app()->environmentPath();
        $this->file = app()->environmentFile();
        $this->path = "{$this->dir}/{$this->file}";
        $this->filesystem = $filesystem;
    }

    /**
     * Handle update config command handler instance.
     *
     * @param \CachetHQ\Cachet\Bus\Commands\System\Config\UpdateConfigCommand $command
     *
     * @return void
     */
    public function handle(UpdateConfigCommand $command)
    {
        foreach ($command->values as $setting => $value) {
            $this->writeEnv($setting, $value);
        }

        if (app()->configurationIsCached()) {
            $this->filesystem->delete(app()->getCachedConfigPath());
        }
    }

    /**
     * Replicate phpdotenv's nested variable resolution to identify if a given
     * value contains such sequences.
     *
     * @param string $value
     *
     * @return string
     */
    protected function resolveNestedVariables($value)
    {
        if (strpos($value, '$') !== false) {
            $value = preg_replace_callback(
                '/\${([a-zA-Z0-9_.]+)}/',
                function ($matchedPatterns) {
                    $nestedVariable = env($matchedPatterns[1]);
                    if ($nestedVariable === null) {
                        return $matchedPatterns[0];
                    } else {
                        return $nestedVariable;
                    }
                },
                $value
            );
        }

        return $value;
    }

    /**
     * Writes to the .env file with given parameters.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    protected function writeEnv($key, $value)
    {
        if (strstr($key, "\n") !== false || strstr($value, "\n") !== false) {
            throw new InvalidSettingValueException('New setting key or value contains new lines');
        }

        (new Dotenv($this->dir, $this->file))->safeLoad();

        $envKey = strtoupper($key);
        $envValue = env($envKey) ?: 'null';

        if ($this->resolveNestedVariables($value) !== $value) {
            throw new InvalidSettingValueException("New setting key $envKey contains a nested variable");
        }

        file_put_contents($this->path, str_replace(
            "{$envKey}={$envValue}",
            "{$envKey}={$value}",
            file_get_contents($this->path)
        ));
    }
}
