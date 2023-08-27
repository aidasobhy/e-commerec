@extends('layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=""> {{__('Admin/sliders.main')}} </a>
                                </li>

                                <li class="breadcrumb-item active">  {{__('Admin/sliders.main slider')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('dashboard.alerts.success')
                                @include('dashboard.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.sliders.store.db')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i>   {{__('Admin/sliders.slider images')}}</h4>
                                                <div class="form-group">
                                                    <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                        <div class="dz-message">{{__('Admin/sliders.upload multi image')}}</div>
                                                    </div>
                                                    <br><br>
                                                </div>


                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('Admin/sliders.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('Admin/sliders.save')}}
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="card-text">
                            <p> {{__('Admin/sliders.current image')}}</p>
                        </div>
                    </div>
                    <div class="card-body  my-gallery" itemscope="" itemtype="http://schema.org/ImageGallery"
                         data-pswp-uid="1">
                        <div class="row">
                            @isset($images)
                                @forelse($images as $image )
                                    <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope=""
                                            itemtype="http://schema.org/ImageObject">
                                        <a href="{{$image -> photo}}" itemprop="contentUrl"
                                           data-size="480x360">
                                            <img class="img-thumbnail img-fluid"
                                                 src="{{$image -> photo}}"
                                                 itemprop="thumbnail" alt="Image description">
                                        </a>
                                    </figure>
                                @empty
                                      {{__('Admin/sliders.There are no pictures until now')}}
                                @endforelse
                            @endisset
                        </div>

                    </div>

        </div>
    </div>



@stop

@section('script')


    <script>

        var uploadedDocumentMap = {}
        Dropzone.options.dpzMultipleFiles = {
            paramName: "dzfile", // The name that will be used to transfer the file
            //autoProcessQueue: false,
            maxFilesize: 5, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
            dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
            dictCancelUpload: "الغاء الرفع ",
            dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
            dictRemoveFile: "حذف الصوره",
            dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هذا ",
            headers: {
                'X-CSRF-TOKEN':
                    "{{ csrf_token() }}"
            }

            ,

            url: "{{ route('admin.sliders.store') }}", // Set the url
            success:
                function (file, response) {
                    $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
                    uploadedDocumentMap[file.name] = response.name
                }
            ,
            removedfile: function (file) {
                file.previewElement.remove();
                var name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;

                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="images[]"][value="' + name + '"]').remove();

            }
            ,
            // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
            init: function () {

                @if(isset($event) && $event->images)
                var files =
                    {!! json_encode($event->images) !!}
                    for (var i in files) {
                    var file = files[i];
                    this.options.addedfile.call(this, file);
                    file.previewElement.classList.add('dz-complete');
                    $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }



    </script>
@stop
