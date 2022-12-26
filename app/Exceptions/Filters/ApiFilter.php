<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Exceptions\Filters;

use Exception;
use GrahamCampbell\Exceptions\Filter\FilterInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiFilter implements FilterInterface
{
    /**
     * Filter and return the displayers.
     *
     * @param \GrahamCampbell\Exceptions\Displayer\DisplayerInterface[] $displayers
     * @param \Illuminate\Http\Request                                   $request
     * @param \Throwable                                                 $original
     * @param \Throwable                                                 $transformed
     * @param int                                                        $code
     *
     * @return \GrahamCampbell\Exceptions\Displayer\DisplayerInterface[]
     */
    public function filter(array $displayers, Request $request, \Throwable $original, \Throwable $transformed, int $code): array
    {
        if ($request->is('api*')) {
            foreach ($displayers as $index => $displayer) {
                if (!Str::contains($displayer->contentType(), 'application/')) {
                    unset($displayers[$index]);
                }
            }
        }

        return array_values($displayers);
    }
}
