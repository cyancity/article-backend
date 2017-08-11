 <div class="col-md-3">
            @section('leftmenu')
            <div class="list-group">
                <a href="{{ url('article') }}" class="list-group-item 
                                    {{ Request::getPathInfo() == '/article' ? 'active' : '' }}
                                ">新闻列表</a>
                <a href="{{ url('article/create') }}" class="list-group-item 
                                    {{ Request::getPathInfo() == '/article/create' ? 'active' : '' }}
                                ">添加新闻</a>
            </div>
            @show
        </div> 