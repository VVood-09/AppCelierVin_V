@extends('layouts.admin')
@section('title', 'Statistiques')
@section('content')

<section class="stats">

    <h1>Statistiques du site</h1>
    <div x-data="slider()">
        <article x-ref="slider" data-interval="6000">
            
            <nav role="tablist">
                <ul>
                    <li><a href="#" role="tab">Membres</a></li>
                    <li><a href="#" role="tab">Vins</a></li>
                    <li><a href="#" role="tab">Commentaires</a></li>
                    <li><a href="#" role="tab">Notes</a></li>
                </ul>
            </nav>
            
            <div class="grid">
                <div x-show="tab == 0" x-cloak>
                    <h4>First content</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam quo odit veritatis distinctio mollitia error, delectus minima exercitationem vitae minus maiores sapiente praesentium ut velit impedit beatae commodi soluta magni!</p>
                </div>
                <div x-show="tab == 1" x-cloak>
                    <h4>Second content</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam quo odit veritatis distinctio mollitia error, delectus minima exercitationem vitae minus maiores sapiente praesentium ut velit impedit beatae commodi soluta magni!</p>
                </div>
                <div x-show="tab == 2" x-cloak>
                    <h4>Third content</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam quo odit veritatis distinctio mollitia error, delectus minima exercitationem vitae minus maiores sapiente praesentium ut velit impedit beatae commodi soluta magni!</p>
                </div>
                    <div x-show="tab == 3" x-cloak>
                        <h4>Fourth content</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam quo odit veritatis distinctio mollitia error, delectus minima exercitationem vitae minus maiores sapiente praesentium ut velit impedit beatae commodi soluta magni!</p>
                    </div>
                </div>
                
            </article>
        </div>
        
    </section>
        @endsection
        
        
        
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('slider', () => ({
                    
                    // set initial tab
                    tab: 0,
                
                // slider tabs
                tabs: [...document.querySelectorAll('nav[role=tablist] a[role=tab]')],
                
                init() {
                    // initialize main function
                    this.changeSlide()
                },
                
                // main function
                changeSlide() {
                    let timeInterval = this.$refs.slider.dataset.interval;
                    this.tabs[this.tab].setAttribute('class', 'active')
                    
                    // set interval to change slide
                    let startInterval = () => {
                        this.tab = (this.tab < this.tabs.length - 1)? this.tab + 1 : 0;
                        this.tabs.forEach( (tab)=> {
                            (this.tab == this.tabs.indexOf(tab)) ?  tab.setAttribute('class', 'active') : tab.removeAttribute('class') 
                        })
                    }
                    
                    // start interval to change slide
                    // let slideInterval = setInterval(startInterval, timeInterval);
                    
                    // mouse over slider stops slide
                    this.$refs.slider.onmouseover = () => {
                        if (slideInterval) { 
                            clearInterval(slideInterval)
                            slideInterval = null;
                        }
                    }
                    
                    // mouse out slider starts again slide
                    this.$refs.slider.onmouseout = () => {
                        if (slideInterval === null) { 
                            slideInterval = setInterval(startInterval, timeInterval);
                        }
                    }
                    
                    // slider tabs click event 
                    this.tabs.forEach( (tab)=> {
                        tab.addEventListener('click', (e)=> {
                            e.preventDefault()
                            this.tab = this.tabs.indexOf(e.target)
                            this.tabs.forEach( (tab)=> {
                                (this.tab == this.tabs.indexOf(tab)) ?  tab.setAttribute('class', 'active') : tab.removeAttribute('class') 
                            }) 
                        })
                    })
                }
            }))
        })
    </script>
    
<!-- https://github.com/RWDevelopment/alpine_js_slider/blob/main/index.html-->