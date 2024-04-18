<div class="container-fluid ">
    <div class="row h-100 text-dark ">
        <!-- Colonne pour les filtres -->
        <div class="card shadow-lg col-xl-4 col-sm border pt-5">
            <div class="col-xl-10 col-sm mx-auto">
                <h1>Filtres <i class="fas fa-filter fa-fw"></i></h1>
                <div class="d-flex" style="height: 20px;"></div>
                <div class="input-group mb-3">
                    <input type="search" class="form-control" id="search" placeholder="Rechercher un article"
                        aria-label="SearchBar" aria-describedby="button-search" />
                    <button class="btn btn-outline-secondary" type="button" id="searchButton">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <div class="d-flex" style="height: 20px;"></div>
                <p class='h4'>Catégories</p>
                <hr class="w-100" />

                <div class="btn-group dropdown w-100">
                    <select class="form-select" name="type" required>
                        <option value="All">Toutes les catégories</option>
                        {{-- <option value="Digital">Digital</option>
                    <option value="Immobilier">Immobilier</option>
                    <option value="Mode">Mode</option> --}}
                    </select>
                </div>
            </div>
        </div>
        <!-- Colonne pour les articles -->
        <div class="col-xl-8 col-sm text-center border pt-5">
            <div class="col-xl-10 mx-auto">
                <h1>Articles</h1>
                <div class="d-flex" style="height: 50px;"></div>
                <div class="row d-flex flex-wrap" id="productsContainer">
                    <div class="col-xl-4 mb-5 product-card" data-category="">
                        <div class='card shadow-lg col-xl-12 col-sm-6 border pt-5 mx-auto' style="height:450px;">
                            <div style="height: 200px;">
                                <img src='./Pictures/' class='img-fluid mx-auto h-75 d-inline-block'>
                            </div>
                            <div class='card-body'>
                                <h5 class='card-title pb-1'></h5>
                                <p class='card-text h5 pb-4'>Prix €</p>
                                <form action="/product" method="post">
                                    <input class="d-none" type="text" name="id_product" value="" />
                                    <button type="submit" class='btn btn-primary btn-lg'>Voir le produit</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>