@extends('admin.include.master')
@section('body')
<div class="container font">
    <?php
    $productCount = $products->count();    
    ?>
    <h3 class="header smaller lighter blue d-inline">All Products ({{ $productCount }})</h3> 
    <!-- div.dataTables_borderWrap -->
    <div>
        <form class="col-md-offset-3 text-right">
            <a href="{{route('products.create')}}" class="align-items-center btn btn-theme btn-primary">
                <i class="menu-icon fa fa-plus"></i> Add New
            </a>
        </form>
        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="row">
                <table id="example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                    <thead>
                        <tr role="row">
                            <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label=" ">S/N</th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="service Name: activate to sort column ascending">Category</th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="service Name: activate to sort column ascending">Name</th>
                            <th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="service Name: activate to sort column ascending">Price</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Short Desp</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Long Desp</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Preview</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @php
                            $sn = 1;
                        @endphp
                        @foreach ($products as $product)
                            <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                                <td class="center">{{ $sn++ }}</td>
                                <td>{{ $product->category->name ?: 'Unknown Category' }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    {!! $product->short_desp ? substr($product->short_desp, 0, 20) : 'Null' !!}
                                </td>
                                
                                <td>
                                    {!! $product->long_desp ? substr($product->long_desp, 0, 20) : 'Null' !!}
                                </td>
                                
                                <td>
                                    <img width="50" src="{{ asset('images/products/preview/' . $product->preview) }}" alt="">
                                </td>
                                <td class="btn-group" style="display: flex; justify-content: center">
                                    <a class="btn btn-sm btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Delete This!')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection