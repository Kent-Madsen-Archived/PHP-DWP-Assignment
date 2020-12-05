<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */
?>
<footer> 
    <div class="information-container">
        <div class="row">
            <?php $domain = new PageDomainDomain();
                $footer = $domain->retrievePageElementByAreaKey('footer_about');?>
              <div class="col l6 s12">
                <h4 class="white-text"><?php echo $footer->getTitle();?></h4>
                <p class="grey-text text-lighten-4"><?php echo $footer->getContent();?></p>
              </div>

              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                    <ul>
                        <li> 
                            <a href="/shop" class="grey-text text-lighten-3"> Shop </a>
                        </li>
                        
                        <li> 
                            <a href="/news" class="grey-text text-lighten-3"> News </a>
                        </li>

                        <li> 
                            <a href="/about" class="grey-text text-lighten-3"> About </a>
                        </li>

                        <li> 
                            <a href="/contact" class="grey-text text-lighten-3"> Contact </a>
                        </li>

                        <li> 
                            <a href="/login" class="grey-text text-lighten-3"> Login</a>
                        </li>
                    </ul>
              </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            © 2020 Copyright DWP Assignment
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</footer>