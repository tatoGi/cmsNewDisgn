@if ($paginator->hasPages())

            <ul>
                <li style="list-style: none;">
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="65.542" height="33.382"
                                viewBox="0 0 65.542 33.382">
                                <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right"
                                    transform="translate(2 2.829)">
                                    <g id="Arrow_-_Right" data-name="Arrow - Right"
                                        transform="translate(0 27.725) rotate(-90)">
                                        <path id="Stroke_1" data-name="Stroke 1" d="M0,61.542V0"
                                            transform="translate(13.863)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
                                        <path id="Stroke_3" data-name="Stroke 3" d="M27.725,0,13.864,13.837,0,0"
                                            transform="translate(0 47.705)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
                                    </g>
                                </g>
                            </svg>
                        </span>
                        Prev
                    </a>
                </li>
                @foreach ($elements as $element)
                @if (is_array($element))
                @foreach ($element as $page => $url)

                <li style="list-style: none;" @if($paginator->currentPage() == $page) class="pagination-color" @endif  ><a
                        href="{{$url}}">{{$page}}</a></li>
                @endforeach
                @endif
                @endforeach

                <li style="list-style: none;">
                    <a href="{{ $paginator->nextPageUrl() }}">
                        Next
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="65.542" height="33.382"
                                viewBox="0 0 65.542 33.382">
                                <g id="Iconly_Light_Arrow_-_Right" data-name="Iconly/Light/Arrow - Right"
                                    transform="translate(2 2.829)">
                                    <g id="Arrow_-_Right" data-name="Arrow - Right"
                                        transform="translate(0 27.725) rotate(-90)">
                                        <path id="Stroke_1" data-name="Stroke 1" d="M0,61.542V0"
                                            transform="translate(13.863)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
                                        <path id="Stroke_3" data-name="Stroke 3" d="M27.725,0,13.864,13.837,0,0"
                                            transform="translate(0 47.705)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            stroke-width="4" />
                                    </g>
                                </g>
                            </svg>
                        </span>
                    </a>
                </li>
            </ul>
     

@endif
