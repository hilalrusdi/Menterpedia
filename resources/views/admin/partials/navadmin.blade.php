<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <form action="/adm/home" method="post">
                    @csrf
                    <input type="hidden" name="tkn" value={{ $tkn }}>
                    <button type="submit" class="nav-link astext"><a class="nav-link">Home</a></button>
                </form>
            </li>
            <li class="nav-item">
                <form action="/adm/verif" method="post">
                    @csrf
                    <input type="hidden" name="tkn" value={{ $tkn }}>
                    <button type="submit" class="nav-link astext"><a class="nav-link">Verifikasi</a></button>
                </form>
            </li>
            <li class="nav-item">
                <form action="/adm/ad" method="post">
                    @csrf
                    <input type="hidden" name="tkn" value={{ $tkn }}>
                    <button type="submit" class="nav-link astext"><a class="nav-link">Ad</a></button>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Report</a>
            </li>
            </ul>
        </div>
    </div>
</nav>