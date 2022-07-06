
@if($model->type_id !== 4)
        <section>

            <div class=" footer-adv2 footer-adv ">

                <div class="container">

                    <div class="footer-cont"> 

                        <div class="row add-items-end">

                            <div class="col-lg-8 col-md-8 col-sm-8 col-12">

                                <div class="adv-text">

                                    <h2>

                                    {!! settings('Footer_Banner_Contact') !!}
                                    </h2>

                                    <div class="text">

                                    {!! settings('Footer_Banner_Text') !!}

                                    </div>

                                </div>

                            </div>

                            

                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 add-end">

                          

                                <a href="{{settings('footer_banner_link') }}" class="adv-link"> 

                             

                                    <span>{{trans('website.Contact_Us')}}</span>

                                    <span> 

                                        <svg xmlns="http://www.w3.org/2000/svg" width="65.542" height="33.382" viewBox="0 0 65.542 33.382">

                                            <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right" transform="translate(2 2.829)">

                                            <g id="Arrow_-_Right" data-name="Arrow - Right" transform="translate(0 27.725) rotate(-90)">

                                                <path id="Stroke_1" data-name="Stroke 1" d="M0,61.542V0" transform="translate(13.863)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="4"/>

                                                <path id="Stroke_3" data-name="Stroke 3" d="M27.725,0,13.864,13.837,0,0" transform="translate(0 47.705)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="4"/>

                                            </g>

                                            </g>

                                        </svg>

                                    </span>

                                </a>

                            </div>

                            

                        </div>

                    </div>

                </div>

            </div>

        </section>
        @endif