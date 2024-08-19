<div>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-1">
            </div>

            <div class="col-10"
                 x-data="{ isUploading: false, progress: 0 }"
                 x-on:livewire-upload-start="isUploading = true"
                 x-on:livewire-upload-finish="isUploading = false"
                 x-on:livewire-upload-error="isUploading = false"
                 x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <form wire:submit.prevent="save"
                      enctype="multipart/form-data">
                    @csrf
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile mb-3">Upload File</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" wire:model="transaction_file"  class="custom-file-input"
                                       id="exampleInputFile" accept=".csv">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <div x-show="isUploading" class="mb-3">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                        <div class="mb-3">
                            @error('transaction_file') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn mb-3" wire:loading.attr="disabled" wire:target="transaction_file"
                                style="background-color: #091E3E;color: white"><span wire:loading.remove>Upload</sp an>
                            <span wire:loading>Importing ..</span></button>
                        <a href="{{ route('admin.upload_data.transactions.index') }}" class="btn mb-3"
                           style="background-color: #091E3E;color: white">Back</a>
                    </div>
                </form>
                <!-- /.card -->
            </div>
            <div class="col-1">

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
