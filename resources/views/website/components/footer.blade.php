
<footer>
        <div class="footer">
            <div class="container">
                <div class="footer-links">
                    <ul>
                    {!! settings('mesenger_plugin') !!}
                   
                        @foreach ($footerSections as $key => $fsection)
                            @if ($fsection !== 0)
                            <li>
                                <a href="/{{ $fsection->getFullSlug() }}">{{ strtoupper($fsection[app()->getlocale()]->title) }}</a>
                                
                                <div class="sub-menu">
                                    @if ($fsection->children->count() > 0)
                                    @foreach ($fsection->children as $subSec)
                                    <div class="sub-menu-links">
                                        <a href="/{{ $subSec->getFullSlug() }}">{{ strtoupper($subSec[app()->getlocale()]->title) }}</a>

                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </li>
                            @endif
                            @endforeach
                    </ul>
                    <div class="footer-socials">
                        <li><a href="{{settings('facebook')}}"><span class="icon-face"></span></a></li>
                        <li><a href="{{settings('twitter')}}"><span class="icon-tw"></span></a></li>
                        <li><a href="{{settings('instagram')}}"><span class="icon-inst"></span></a></li>
                    </div>
                    <div class="create">
                        <a href="#" class="title">{{trans('admin.COPYRIGHT')}}</>
                        <a href="https://ideadesigngroup.ge/ka" class="title">{{trans('admin.MADE_BY_IDEA')}}</>
                    </div>
                </div>
            </div>
        </div>
    </footer>