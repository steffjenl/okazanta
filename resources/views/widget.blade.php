function loadWidget() {
    document.getElementById("statusMessage").innerHTML ='<div class="statusMessage alert alert-{{ $status }}">{{ $message }}</div>';
}

loadWidget();
