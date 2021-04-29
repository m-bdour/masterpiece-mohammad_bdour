
	<!-- Pagination -->
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12">
      <!-- Pagination -->
      <div class="pagination-container margin-top-60 margin-bottom-60">
        <nav class="pagination">
          <ul>
            @if($paginator->onFirstPage())
            <li class="pagination-arrow disabled"><a ><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>

          @else
          <li class="pagination-arrow"><a href="{{ $paginator->previousPageUrl() }}"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
          @endif

          @foreach($elements as $element)
          <!-- Make three dots -->
          @if(is_string($element))
          <li><a class="current-page disabled">{{$element}}</a></li>
          @endif
   
          <!-- Links Array Here -->
          @if(is_array($element))
              @foreach($element as $page=>$url)
   
               @if($page == $paginator->currentPage())
               <li><a class="current-page active">{{$page}}</a></li>
               @else
               <li><a href="{{ $url }}">{{ $page }}</a></li>
               @endif
   
              @endforeach
          @endif
   
     @endforeach
   
            @if($paginator->hasMorePages())
            <li class="pagination-arrow"><a href="{{ $paginator->nextPageUrl() }}"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
          @else
          <li class="pagination-arrow disabled"><a ><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>

          @endif
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <!-- Pagination / End -->