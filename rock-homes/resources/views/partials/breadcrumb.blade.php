   @php
    
       $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
        foreach($crumbs as $crumb){
             ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
            //  preg_replace('/(&|\?|\/)'.preg_quote($param).'=[^&?/\]*$/', '', $url)
        }

        function removeParam($url, $param) {
            $url = preg_replace('/(&|\?)'.preg_quote($param).'=[^&]*$/', '', $url);
            $url = preg_replace('/(&|\?)'.preg_quote($param).'=[^&]*&/', '$1', $url);
            return $url;
        }
        // ddd($_SERVER["REQUEST_URI"]);
   @endphp
   <div class="breadcrumb-area">
        <a 
            class="nav-link "
            href="{{ url("admin-portal/home") }}" 
            data-toggle="tooltip" 
            data-placement="bottom" 
            title="" 
            data-original-title="Dashboard">
            <h1>Dashboard</h1>
        </a>
        <ol class="breadcrumb">
            {{-- {{ ddd((Request::segments())) }} --}}
            <?php $link = "" ?>
            @for($i = 1; $i <= count(Request::segments()); $i++)
                @if($i < count(Request::segments()) & $i > 0)
                <?php $link .= "/" . Request::segment($i); ?>
                <li class="item">
                    {{ ucwords(str_replace('-',' ', Request::segment($i))) }}
                </li>
                @elseif( count(Request::segments()) & $i > 0) 
                <li class="item text-capitalize">
                    {{ Request::segment($i - count(Request::segments())) }}
                </li>
                @endif
            @endfor 
            
                </ol>
        </div>

    
    