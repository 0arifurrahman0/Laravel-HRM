<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			
			<!-- Optionally, you can add icons to the links -->
			<li class="active">
				<a href="{{ url('/') }}">
					<i class="fa fa-tachometer" aria-hidden="true"></i>
					<span>Dashboard</span>
				</a>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-handshake-o" aria-hidden="true"></i>
					<span>HRM & Payroll</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ url('employee') }}">
							<i class="fa fa-dot-circle-o text-muted" aria-hidden="true"></i>
							<span>Employee</span>
						</a>
					</li>
					<li>
						<a href="{{ url('employee/department') }}">
							<i class="fa fa-dot-circle-o text-primary" aria-hidden="true"></i>
							<span>Department</span>
						</a>
					</li>
					<li>
						<a href="{{ url('employee/designation') }}">
							<i class="fa fa-dot-circle-o text-success" aria-hidden="true"></i>
							<span>Designation</span>
						</a>
					</li>
					<li>
						<a href="{{ url('employee/type') }}">
							<i class="fa fa-dot-circle-o text-info" aria-hidden="true"></i>
							<span>Employee type</span>
						</a>
					</li>
					<li>
						<a href="{{ url('employee/shift') }}">
							<i class="fa fa-dot-circle-o text-warning" aria-hidden="true"></i>
							<span>Working shift</span>
						</a>
					</li>
					<li>
						<a href="{{ url('employee/salary-rule') }}">
							<i class="fa fa-dot-circle-o text-danger" aria-hidden="true"></i>
							<span>Salary rule</span>
						</a>
					</li>
					<li>
						<a href="{{ url('employee/pay-scale') }}">
							<i class="fa fa-dot-circle-o text-muted" aria-hidden="true"></i>
							<span>PayScale</span>
						</a>
					</li>
					<li>
						<a href="{{ url('employee/attendance') }}">
							<i class="fa fa-dot-circle-o text-info" aria-hidden="true"></i>
							<span>Attendance</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-university" aria-hidden="true"></i>
					<span>Branch</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ url('branch') }}">
							<i class="fa fa-dot-circle-o text-info" aria-hidden="true"></i>
							<span>Branch</span>
						</a>
					</li>
					<li>
						<a href="{{ url('customer/group') }}">
							<i class="fa fa-dot-circle-o text-danger" aria-hidden="true"></i>
							<span>Group</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<span>Customer</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ url('customer') }}">
							<i class="fa fa-dot-circle-o text-info" aria-hidden="true"></i>
							<span>Customer</span>
						</a>
					</li>
					<li>
						<a href="{{ url('customer/accounts/create') }}">
							<i class="fa fa-dot-circle-o text-warning" aria-hidden="true"></i>
							<span>Accounts</span>
						</a>
					</li>
					<li>
						<a href="{{ url('customer/borrow') }}">
							<i class="fa fa-dot-circle-o text-muted" aria-hidden="true"></i>
							<span>Loan</span>
						</a>
					</li>
					<li>
						<a href="{{ url('customer/balance') }}">
							<i class="fa fa-dot-circle-o text-success" aria-hidden="true"></i>
							<span>Customar balance</span>
						</a>
					</li>
					<li>
						<a href="{{ url('calculator') }}">
							<i class="fa fa-dot-circle-o text-success" aria-hidden="true"></i>
							<span>Loan calculator</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</section>
</aside>