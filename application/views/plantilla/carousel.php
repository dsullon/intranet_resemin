<div class="row">
    <!-- The carousel -->
    <div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#transition-timer-carousel" data-slide-to="1"></li>
            <li data-target="#transition-timer-carousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?= base_url() ?>img/1.jpg" />
                <div class="carousel-caption">
                    <h1 class="carousel-caption-header">Slide 1</h1>
                    <p class="carousel-caption-text hidden-sm hidden-xs">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim aliquet rutrum. Praesent vitae ante in nisi condimentum egestas. Aliquam.
                    </p>
                </div>
            </div>
            
            <div class="item">
                <img src="<?= base_url() ?>img/2.jpg" />
                <div class="carousel-caption">
                    <h1 class="carousel-caption-header">Slide 2</h1>
                    <p class="carousel-caption-text hidden-sm hidden-xs">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim aliquet rutrum. Praesent vitae ante in nisi condimentum egestas. Aliquam.
                    </p>
                </div>
            </div>
            
            <div class="item">
                <img src="<?= base_url() ?>img/3.jpg" />
                <div class="carousel-caption">
                    <h1 class="carousel-caption-header">Slide 3</h1>
                    <p class="carousel-caption-text hidden-sm hidden-xs">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim aliquet rutrum. Praesent vitae ante in nisi condimentum egestas. Aliquam.
                    </p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
        
        <!-- Timer "progress bar" -->
        <hr class="transition-timer-carousel-progress-bar animate" />
    </div>
</div>
    <!--http://avenir.ro/codeigniter-tutorials/creating-using-page-templates-codeigniter/-->