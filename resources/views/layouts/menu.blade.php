<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('testimonies*') ? 'active' : '' }}">
    <a href="{{ route('testimonies.index') }}"><i class="fa fa-edit"></i><span>Testimonies</span></a>
</li>

<li class="{{ Request::is('testAndEvaluations*') ? 'active' : '' }}">
    <a href="{{ route('testAndEvaluations.index') }}"><i class="fa fa-edit"></i><span>Test And Evaluations</span></a>
</li>

<li class="{{ Request::is('blogCategories*') ? 'active' : '' }}">
    <a href="{{ route('blogCategories.index') }}"><i class="fa fa-edit"></i><span>Blog Categories</span></a>
</li>

<li class="{{ Request::is('blogs*') ? 'active' : '' }}">
    <a href="{{ route('blogs.index') }}"><i class="fa fa-edit"></i><span>Blogs</span></a>
</li>

<li class="{{ Request::is('blogComments*') ? 'active' : '' }}">
    <a href="{{ route('blogComments.index') }}"><i class="fa fa-edit"></i><span>Blog Comments</span></a>
</li>

<li class="{{ Request::is('chatDiscussions*') ? 'active' : '' }}">
    <a href="{{ route('chatDiscussions.index') }}"><i class="fa fa-edit"></i><span>Chat Discussions</span></a>
</li>

<li class="{{ Request::is('chatMessages*') ? 'active' : '' }}">
    <a href="{{ route('chatMessages.index') }}"><i class="fa fa-edit"></i><span>Chat Messages</span></a>
</li>

