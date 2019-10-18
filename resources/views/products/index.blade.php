<!DOCTYPE html>
<html>
<head>
	@include('layouts.template')
	<title>Products</title>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
		    <div class="navbar-header">
		        <a class="navbar-brand" href="{{ URL::to('products') }}">Products</a>
		    </div>
		    <ul class="nav navbar-nav">
		        <li><a href="{{ URL::to('products/create') }}">Add product</a>
		    </ul>
		</nav>
		@if ($message = Session::get('success'))
	        <script>
	        	Swal.fire({
				  type: 'success',
				  title: 'Success',
				  text: '{{$message}}',
				})
	        </script> 	
	    @endif
		<table id='birdTable' class='display'>
			<thead>
		        <tr>
		        	<th>Id</th>
		            <th>Name</th>
		            <th>Price</th>
		            <th>Actions</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach($products as $prod)
		        <tr>
		            <td>{{$prod->id}}</td>
		            <td>{{$prod->name}}</td>
		            <td>{{$prod->price}}</td>
		            <td>
		                <form action="{{ route('products.destroy',$prod->id) }}" method="POST">
		   
		                    <a class="btn btn-info" href="{{ route('products.show',$prod->id) }}">Show</a>
		    
		                    <a class="btn btn-primary" href="{{ route('products.edit',$prod->id) }}">Edit</a>
		   					
		   					@csrf
		   					@method('DELETE')

		                    {{-- <a class="btn btn-danger confirmDelete" href="#" data-id="{{$prod->id}}">Delete</a> --}}
		                    {{-- <input type="button" name="confirmDelete" value="Delete" class="btn btn-danger confirmDelete"> --}}
		                    <button type="submit" class="btn btn-danger">Delete</button>
		                </form>
		            </td>
		        </tr>
		        @endforeach
		    </tbody>
		</table>
	</div>
</body>
</html>
<script>
	$(document).ready(function() {
	 	$('#birdTable').DataTable();
	});

	// function showDetails(){
	// 	// Swal.fire('{{$prod->description}}');
	// 	Swal.fire(
	// 	  '{{$prod->name}}',
	// 	  'Description: {{$prod->description}}',
	// 	)
	// }
	// $(".confirmDelete").on("submit", function(){
 //        return confirm("Do you want to delete this item?");
 //    });
	// $('.confirmDelete').click(function(){
	// 	var postId = $(this).data('id'); 
	// 	Swal.fire({
	// 	  title: 'Are you sure?',
	// 	  text: "You won't be able to revert this!",
	// 	  type: 'warning',
	// 	  showCancelButton: true,
	// 	  confirmButtonColor: '#3085d6',
	// 	  cancelButtonColor: '#d33',
	// 	  confirmButtonText: 'Yes, delete it!'
	// 	}).then((result) => {
	// 		  if (result.value) {
	// 		    window.location = '{{ route('products.destroy', $prod->id) }}';
	// 		  };
	// 	})
	// });
</script>