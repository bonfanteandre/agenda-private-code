<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Agenda Telefônica</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/clients"><i class="fa fa-users"></i> Clientes</a>
            </li>
        </ul>

        <form method="POST" action="/logout">

            @csrf
            <button type="submit" class="btn btn-default text-white">
                <i class="fa fa-sign-out-alt"></i> Sair
            </button>
        </form>
    </div>
</nav>
