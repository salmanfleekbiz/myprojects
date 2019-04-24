<!-- sidebar: style can be found in sidebar.less -->

<section class="sidebar">

  <!-- Sidebar Menu -->

  <ul class="sidebar-menu">

    <!--li class="header"><span class="pull-left hide"><img src="{{asset('admin/img/'.$settings->avatar)}}" class="img-circle image-50" alt="{{$settings->site_title}}" /></span><span class="pull-left">MENU</span></li-->

    <!-- Optionally, you can add icons to the links -->

    

	

	<!--li class="user-header">

		<img src="{{asset($user->avatar)}}" class="img-circle image-100 image-center" alt="User Image" />

		<p>

		  {{$user->firstname}} {{$user->lastname}} - {{$user->designation}}

		  <small><? /*=date('F, Y',strtotime($user->created_at))*/?></small>

		</p>

		<div class="pull-left">

			<a href="{{url('/owner/users')}}" class="btn btn-default btn-flat">Profile</a>

		</div>

		<div class="pull-right">

			<a href="{{url('/auth/logout')}}" class="btn btn-default btn-flat">Sign out</a>

		</div>

	</li-->

	

	<!-- <li class="treeview" id="treeview-business">

      <a href="#"><i class='fa fa-dollar'></i> <span>Business</span> <i class="fa fa-angle-left pull-right"></i></a>

      <ul class="treeview-menu">

        <li><a href="{{url('/owner/reservations')}}"><i class='fa fa-plane'></i> <span>Reservations</span></a></li>

        <li><a href="{{url('/owner/transactions')}}"><i class='fa fa-money'></i> <span>Transactions</span></a></li>

        

        <li><a href="{{url('/owner/dashboard')}}"><i class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>

      </ul>

    </li> -->

    <?php

    $get_chat_user = DB::table('chat_userdata')->where('session_id',Auth::user()->id)->first();

    $user_log_id = $get_chat_user->id;

    $count_chat = DB::table('chat_messages')->where('to_id',$user_log_id)->where('recd','0')->count();

    ?>

    <li class="treeview" id="treeview-settings">

      <a href="{{url('/owner/dashboard')}}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>

    </li>

    <?php if(Auth::user()->role=='owner') {  ?>

      <li class="treeview" id="treeview-settings">

      <a href="{{url('/owner/properties')}}"><i class="fa fa-home"></i> <span>Properties</span></a>

    </li>

    <!-- <li class="treeview" id="treeview-settings">

      <a href="{{url('/owner/inquiries')}}"><i class="fa fa-pencil"></i> <span>Inquiries</span></a>

    </li> -->



    <li class="treeview" id="treeview-settings">

      <a href="{{url('/chat')}}/{{Auth::user()->id}}/0"><i class="fa fa-commenting-o"></i> <span>Chat&nbsp;</span><?php if($count_chat>0) { ?>

      <span class="chat_bubble">{{$count_chat}}</span> 

      <?php } ?></a>

    </li>

    <?php } else { ?>

    <!-- <li class="treeview" id="treeview-settings">

      <a href="{{url('/owner/inquiries')}}"><i class="fa fa-pencil"></i> <span>My Inquiries</span></a>

    </li> -->

     <li class="treeview" id="treeview-settings">

      <a href="{{url('/chat')}}/{{Auth::user()->id}}/2"><i class="fa fa-commenting-o"></i> <span>Chat&nbsp;</span><?php if($count_chat>0) { ?>

      <span class="chat_bubble">{{$count_chat}}</span> 

      <?php } ?></a>

    </li>

    <?php } ?>

    



    

    <li class="treeview" id="treeview-settings">

      <a href="#"><i class='fa fa-gears'></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>

      <ul class="treeview-menu">



        <li><a href="{{url('/owner/users')}}"><i class='fa fa-user'></i> <span>My Profile</span></a></li>



        

      </ul>

    </li>

	<li class="treeview" id="treeview-settings">

		<a href="{{url('/auth/logout')}}"><i class="fa fa-sign-out"></i> <span>Sign out</span></a>

	</li>

  </ul>

  <!-- /.sidebar-menu -->

</section>

<!-- /.sidebar -->





