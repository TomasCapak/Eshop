
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




</style>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="<?php echo base_url("hlavni"); ?>">Hlavní stránka</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav mr-auto">
                        </ul>
                        <div class="mr-auto "> 
                        
                                             
<form class="input-group marginsearch" action="<?php echo base_url('hlavni/');?>" method="get">
 
    <input name="keyword" value="<?php if($this->input->get('keyword'))echo $this->input->get('keyword');?>" type="search" id="form1" class="form-control" placeholder="Hledat" /> 
  <button type="submit"  class="btn btn-primary searchbtn">
    <i class="fas fa-search"></i>
</button>

</form>

                    </div>

                        </ul>
                        <ul class="navbar-nav marginnav">
                        <li class="nav-item">
                                
                                <a class="nav-link" href="<?php echo base_url('adminForm');?>"><i class="fas fa-plus"></i></a>
                            </li>

                        <li class="nav-item">
                                
                                <a class="nav-link" href="<?php echo base_url('cart'); ?>"><i class="fas fa-shopping-cart"></i></a>
                            </li>
                            <li class="nav-item">
                                
                                <a class="nav-link" href="<?php echo base_url('prihlaseni');?>"><i class="fas fa-sign-in-alt"></i> Přihlášení</a>
                            </li>
                        </ul>
                        
                    </div>
                </nav>   



<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

