<div>

  @if ($modes['productCategoryProductList'])
    @livewire ('cafe-menu-product-category-product-list', ['productCategory' => $selectedProductCategory,])
  @else
    <x-list-component>
      <x-slot name="listInfo">
        Total product categories: {{ \App\ProductCategory::count() }}
      </x-slot>
    
      <x-slot name="listHeadingRow">
        <th>Category</th>
        <th>Products</th>
        <th class="text-right">Action</th>
      </x-slot>
    
      <x-slot name="listBody">
        @foreach ($productCategories as $productCategory)
          <tr>
            <td wire:click="$dispatch('displayProductCategory', { productCategory: {{ $productCategory }} } )" role="button">
                {{ $productCategory->name }}
            </td>
            <td>
              {{ count($productCategory->products) }}
            </td>
            <td class="text-right">
              <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayProductCategory', { productCategory: {{ $productCategory }} } )">
                <i class="fas fa-pencil-alt"></i>
              </button>
              <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayProductCategory', { productCategory: {{ $productCategory }} } )">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-danger px-2 py-1" wire:click="">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
        @endforeach
      </x-slot>
    
      <x-slot name="listPaginationLinks">
        {{ $productCategories->links() }}
      </x-slot>
    </x-list-component>
  @endif

</div>
