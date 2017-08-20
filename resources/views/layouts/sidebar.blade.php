 <div class="col-md-3">
            @section('leftmenu')
            <div class="list-group">
                <a href="{{ url('article') }}" class="list-group-item 
                                    {{ Request::getPathInfo() == '/' ? 'active' : '' }}
                                ">新闻列表</a>
                <a href="{{ url('article/create') }}" class="list-group-item 
                                    {{ Request::getPathInfo() == '/article/create' ? 'active' : '' }}
                                ">添加新闻</a>
                <a href="{{ url('article/topic') }}" class="list-group-item
                                    {{ Request::getPathInfo() == '/article/topic' ? 'active' : '' }}
                                ">修改分类</a>
            </div>
            @show
        </div> 