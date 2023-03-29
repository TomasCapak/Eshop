<style>
    .navbar {
        margin-top: 0 px;
    }

    .marginsearch {
        margin-left: 100px;

    }

    .marginnav {
        margin-left: auto;

    }

    #search-results {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background-color: #fff;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        z-index: 1;
    }

    #search-results ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #search-results li {
        padding: 5px 10px;
        cursor: pointer;
    }

    #search-results li:hover {
        background-color: #f1f1f1;
    }
</style>





<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary ">
    <div class="container">

        <a class="navbar-brand" href="<?php echo base_url("hlavni"); ?>">Hlavní stránka</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
            </ul>





            <div class="mr-auto ">



                <form class="input-group marginsearch" action="<?php echo base_url('hlavni/'); ?>" method="get">

                    <input id="keyword" name="keyword" value="<?php if ($this->input->get('keyword')) echo $this->input->get('keyword'); ?>" type="search" id="form1" class="form-control" placeholder="Hledat" />
                    <!-- <button type="submit" class="btn btn-primary searchbtn">
                        <i class="fas fa-search"></i>
                    </button> -->
                    <div id="search-results" class="mt-3">

                    </div>

                </form>

            </div>

            </ul>
            <ul class="navbar-nav marginnav">
                <?php if ($this->ion_auth->logged_in()) { ?>
                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo base_url('orderList'); ?>">OBJEDNÁVKY</a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo base_url('categoryList'); ?>">KATEGORIE</a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo base_url('adminForm'); ?>"><i class="fas fa-plus"></i></a>
                    </li>
                <?php } ?>
                <li class="nav-item">

                    <a class="nav-link" href="<?php echo base_url('cart'); ?>"><i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="<?php
                                                if ($this->ion_auth->logged_in()) {
                                                    echo base_url('odhlaseni');
                                                } else {

                                                    echo base_url('prihlaseni');
                                                }

                                                ?>
                                "><i class="fas fa-sign-in-alt"></i> <?php
                                                                        if ($this->ion_auth->logged_in()) {
                                                                            echo 'Odhlášení';
                                                                        } else {

                                                                            echo 'Přihlášení';
                                                                        }

                                                                        ?></a>
                </li>
            </ul>


        </div>
    </div>





</nav>





<script>
    //search bar
    const searchInput = document.getElementById('keyword');
    const searchResults = document.getElementById('search-results');

    searchInput.addEventListener('input', function() {
        const searchText = searchInput.value;
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url() . 'search' ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = xhr.responseText;


                if (response.startsWith('NULL')) {
                    response = JSON.parse(response.substring(4));
                } else {
                    response = JSON.parse(xhr.responseText);
                }

                searchResults.innerHTML = '';

                //výpis produktů na stránku
                response.forEach(result => {
                    const resultElement = document.getElementById('search-results');

                    const linkElement = document.createElement('a');
                    linkElement.setAttribute('href', '<?php echo base_url() ?>detail/' + result.nazev)
                    linkElement.innerText = result.nazev;
                    resultElement.appendChild(linkElement);
                    resultElement.appendChild(document.createElement('br'))

                });
            }
        };
        xhr.send(JSON.stringify({
            searchText: searchText
        }));
    });
</script>