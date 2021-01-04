<div>
    <nav aria-label="Page navigation">
        <ul class="pagination">
          <li class="page-item {{ ($page==1)?'disabled':'' }}">
            <a class="page-link" href="{{ request()->fullUrlWithQuery(['page' => $page-1]) }}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>

          @php $pages_count=floor($total/$per_page) @endphp
          @for($i=1;$i<=$pages_count;$i++)
            <li class="page-item {{ ($page==$i)?'active':'' }}">
                <a class="page-link" href="{{ request()->fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a>
            </li>
          @endfor

          <li class="page-item {{ ($page==$pages_count)?'disabled':'' }}">
            <a class="page-link" href="{{ request()->fullUrlWithQuery(['page' => $page+1]) }}" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
</div>
