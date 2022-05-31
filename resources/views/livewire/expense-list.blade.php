<div>

  <div class="my-3 text-secondary py-3" style="font-size: 1.3rem;">
    @if (true)
    <i class="fas fa-calendar mr-2"></i>
    @endif

    <input type="date" wire:model.defer="startDate" class="mr-3" />
    <input type="date" wire:model.defer="endDate" class="mr-3" />

    <button class="btn btn-success" wire:click="getExpensesForDateRange">
      Go
    </button>

    <button wire:loading class="btn">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
  </div>

  <div class="my-4 pl-2 font-weight-bold" style="font-size: 1rem;">
    <span style="font-size: 1.3rem;">
    Total:
    @php echo number_format( $total ); @endphp
    </span>
  </div>

  <div class="card">
    <div class="card-body p-0">
    
      @if (!is_null($expenses) && count($expenses) > 0)
        <table class="table" style="font-size: 1.1rem;">
          <thead>
            <tr class="bg-success-rm text-white-rm">
              <th>ID</th>
              <th>Date</th>
              <th>Expense</th>
              <th>Category</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
    
          <tbody>
            @foreach($expenses as $expense)
            <tr>
              <td>
                {{ $expense->expense_id }}
              </td>
  
              <td class="" style="font-size: 1rem;">
                {{ $expense->date }}
              </td>
  
              <td>
                {{ $expense->name }}
              </td>
  
              <td>
                {{ $expense->expenseCategory->name }}
              </td>
  
              <td>
                @php echo number_format( $expense->amount ); @endphp
              </td>
  
              <td>
                @if (false)
                <button class="btn p-2 border rounded-circle mr-3" 
                    wire:click="">
                  <i class="fas fa-folder-open text-primary"></i>
                </button>
                <button class="btn p-2 border rounded-circle mr-3"
                    wire:click="enterConfirmDeleteExpenseMode({{ $expense }})">
                  <i class="fas fa-trash text-danger"></i>
                </button>
                @endif

                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog text-secondary"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-file text-primary mr-2"></i>
                      View
                    </button>
                    <button class="dropdown-item" wire:click="enterConfirmDeleteExpenseMode({{ $expense }})">
                      <i class="fas fa-trash text-danger mr-2"></i>
                      Delete
                    </button>
                  </div>
                </div>
              </td>
    
            </tr>
            @endforeach
          </tbody>
  
          <tfoot>
            <tr style="font-size: 1.8rem;">
              <th colspan="4" class="text-right mr-3">
                Total
              </th>
              <td>
                @php echo number_format( $total ); @endphp
              </td>
              <td>
              </td>
            </tr>
          </tfoot>
        </table>
      @else
        <div class="p-2 text-muted">
          No expenses
        </div>
      @endif
    
    </div>
  </div>

  @if ($modes['confirmDeleteExpense'])
    @livewire ('expense-list-expense-delete-confirm', ['expense' => $deletingExpense,])
  @endif
</div>
