@extends('backend.layouts.app')

@section('content')
    @php
        $content = json_decode($page->getTranslation('content'), true);
    @endphp
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col">
            <h1 class="h3">{{ $page->getTranslation('title', $lang) }} Page Information</h1>
        </div>
    </div>
</div>

{{-- About Page Content --}}
<div class="card">
    <ul class="nav nav-tabs nav-fill border-light">
        @foreach (\App\Models\Language::all() as $key => $language)
            <li class="nav-item">
                <a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3"
                    href="{{ route('custom-pages.edit', ['id'=>$page->slug, 'lang'=> $language->code] ) }}">
                    <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
                    <span>{{ $language->name }}</span>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="card-header">
        <h6 class="mb-0">{{ $page->getTranslation('title', $lang) }} Page Content</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('custom-pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="lang" value="{{ $lang }}">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">{{ translate('Title') }} <span class="text-danger">*</span>
                    <i class="las la-language text-danger" title="{{ translate('Translatable') }}"></i>
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="{{ translate('Title') }}" name="title"
                        value="{{ $page->getTranslation('title', $lang) }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">{{ translate('Link') }} <span
                        class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <div class="input-group d-block d-md-flex">
                        @if($page->type == 'custom_page')
                            <div class="input-group-prepend"><span
                                    class="input-group-text flex-grow-1">{{ route('home') }}/</span></div>
                            <input type="text" class="form-control w-100 w-md-auto" placeholder="{{ translate('Slug') }}"
                                name="slug" value="{{ $page->slug }}">
                        @else
                            <input class="form-control w-100 w-md-auto" value="{{ route('home') }}/{{ $page->slug }}"
                                disabled>
                        @endif
                    </div>
                    <small class="form-text text-muted">{{ translate('Use character, number, hypen only') }}</small>
                </div>
            </div>

            <div class="form-group">
                    <div class="card-header p-0">
                        <h6 class="p-0 m-0">{{ $page->getTranslation('title', $lang) }} Page Sections</h6>
                    </div>
                <div class="about-page-content-target pt-4">

                    @if (!empty($content))
                        @foreach ($content as $index => $section)
                            @php $count = $index + 1; @endphp
                            <div class="row gutters-5 checksr-no" sr-no="{{$count}}">
                                <div class="col-1 fs-16">No. {{$count}}</div>
                                
                                <div class="col-10">
                                    <div class="row">
                                      <div class="col-md-6">  
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{translate('Heading')}} <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="{{ translate('Heading') }}" name="section_headings[]" value="{{ $section['heading'] }}" required="">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">  
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{translate('Sub Heading')}} <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="{{ translate('Subheading') }}" name="section_subheadings[]" value="{{ $section['subheading'] }}" required="">
                                            </div>
                                        </div>
                                      </div>
                                      
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{ translate('Image') }}</label>
                                            <div class="col-sm-9">
                                                <div class="input-group " data-toggle="aizuploader" data-type="image">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
                                                    </div>
                                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                                    <input type="hidden" class="selected-files" name="section_images[]" value="{{ $section['images'] }}">
                                                </div>
                                                <div class="file-preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{translate('Description')}}</label>
                                            
                                            <div class="col-sm-9">
                                                <textarea
                                						class="aiz-text-editor form-control"
                                						placeholder="{{ translate('Description') }}"
                                						data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'
                                						data-min-height="300"
                                						name="section_description[]">{{ $section['description'] }}</textarea>
                                            </div>
                                		</div>
                                    </div>
                                    
                                    </div>
                                </div>
                                
                                <div class="col-md-1">
                                        @if($index >0)
                                        <button type="button"
                                            class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger remove-section"
                                            data-toggle="remove-parent" data-parent=".row">
                                            <i class="las la-times"></i>
                                        </button>
                                        @endif
                                </div>
                                <div class="col-md-12">
                                     <hr>
                                </div>
                            </div>
                        @endforeach
                     @else (empty($content))
                     <div class="row gutters-5 checksr-no" sr-no="1">
                         <div class="col-1 fs-16">No. 1</div>
                                
                                <div class="col-10">
                                    <div class="row">
                                      <div class="col-md-6">  
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{translate('Heading')}} <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="{{ translate('Heading') }}" name="section_headings[]" value="" required="">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">  
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{translate('Sub Heading')}} <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="{{ translate('Subheading') }}" name="section_subheadings[]" value="" required="">
                                            </div>
                                        </div>
                                      </div>
                                      
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{ translate('Image') }}</label>
                                            <div class="col-sm-9">
                                                <div class="input-group " data-toggle="aizuploader" data-type="image">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
                                                    </div>
                                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                                    <input type="hidden" class="selected-files" name="section_images[]" value="">
                                                </div>
                                                <div class="file-preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{translate('Description')}}</label>
                                					<div class="col-sm-9">
                                                <textarea
                                						class="aiz-text-editor form-control"
                                						placeholder="{{ translate('Description') }}"
                                						data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'
                                						data-min-height="300"
                                						name="section_description[]"></textarea>
                                            </div>
                                		</div>
                                    </div>
                                    
                                    </div>
                                </div>
                                
                                <div class="col-md-1">
                                        <button type="button"
                                            class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger remove-section"
                                            data-toggle="remove-parent" data-parent=".row">
                                            <i class="las la-times"></i>
                                        </button>
                                </div>
                                <div class="col-md-12">
                                     <hr>
                                </div>
                        </div>
                    @endif
                </div>

                <button type="button" class="btn btn-secondary btn-sm" id="addSectionButton">
    {{ translate('Add New Section') }}
</button>

<script>

document.getElementById('addSectionButton').addEventListener('click', function() {
    
     // Find all elements with the class 'checksr-no'
    var allSections = document.querySelectorAll('.checksr-no');
    
    // Calculate the next serial number
    var nextSrNo = allSections.length + 1;
   
    // Create a new div element
    var newSection = document.createElement('div');
    newSection.className = 'row gutters-5 added-section checksr-no';
    newSection.setAttribute('sr-no', nextSrNo);

    // Set the inner HTML content
    newSection.innerHTML = `
                                <div class="col-1 fs-16">No. </div>
                                
                                <div class="col-10">
                                    <div class="row">
                                      <div class="col-md-6">  
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{translate('Heading')}} <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="{{ translate('Heading') }}" name="section_headings[]" value="" required="">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">  
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{translate('Sub Heading')}} <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="{{ translate('Subheading') }}" name="section_subheadings[]" value="" required="">
                                            </div>
                                        </div>
                                      </div>
                                      
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{ translate('Image') }}</label>
                                            <div class="col-sm-9">
                                                <div class="input-group " data-toggle="aizuploader" data-type="image">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
                                                    </div>
                                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                                    <input type="hidden" class="selected-files" name="section_images[]" value="">
                                                </div>
                                                <div class="file-preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="name">{{translate('Description')}}</label>
                                					<div class="col-sm-9">
                                                <textarea
                                						class="aiz-text-editor form-control"
                                						placeholder="{{ translate('Description') }}"
                                						data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'
                                						data-min-height="300"
                                						name="section_description[]"></textarea>
                                            </div>
                                		</div>
                                    </div>
                                    
                                    </div>
                                </div>
                                
                                <div class="col-md-1">
                                        <button type="button"
                                            class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger remove-section"
                                            data-toggle="remove-parent" data-parent=".row">
                                            <i class="las la-times"></i>
                                        </button>
                                </div>
                                <div class="col-md-12">
                                     <hr>
                                </div>
    `;

    // Append the new section to the target element
    document.querySelector('.about-page-content-target').appendChild(newSection);

    // Update serial numbers for all sections
    updateSrNoValues();
    
    AIZ.plugins.textEditor();
    
});
document.addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('remove-section')) {
        // Remove parent section and the <hr> tag above it
        var section = e.target.closest('.checksr-no');
        // Remove parent section
        section.remove();
        // Update serial numbers for all sections
        updateSrNoValues();
    }
});


function updateSrNoValues() {
    // Update section numbers for all sections
    var sections = document.querySelectorAll('.checksr-no');
    sections.forEach(function(section, index) {
        var newCount = index + 1;
        section.querySelector('.fs-16').textContent = 'No. ' + newCount;
        section.setAttribute('sr-no', newCount);
    });
}

</script>

            </div>

            <div class="card-header px-0">
                <h6 class="fw-600 mb-0">{{ translate('SEO Fields') }}</h6>
            </div>

            <div class="card-body px-0">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">{{ translate('Meta Title') }}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="{{ translate('Title') }}" name="meta_title"
                            value="{{ $page->meta_title }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">{{ translate('Meta Description') }}</label>
                    <div class="col-sm-10">
                        <textarea class="resize-off form-control" placeholder="{{ translate('Description') }}"
                            name="meta_description">{!! $page->meta_description !!}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">{{ translate('Keywords') }}</label>
                    <div class="col-sm-10">
                        <textarea class="resize-off form-control" placeholder="{{ translate('Keyword, Keyword') }}"
                            name="keywords">{!! $page->keywords !!}</textarea>
                        <small class="text-muted">{{ translate('Separate with comma') }}</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">{{ translate('Meta Image') }}</label>
                    <div class="col-sm-10">
                        <div class="input-group " data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div
                                    class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
                            </div>
                            <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                            <input type="hidden" name="meta_image" class="selected-files"
                                value="{{ $page->meta_image }}">
                        </div>
                        <div class="file-preview"></div>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        // Add more section button
        $('[data-toggle="add-more"]').on('click', function () {
            var content = $(this).data('content');
            var target = $(this).data('target');
            $(target).append(content);
        });

        // Remove parent section button
        $('[data-toggle="remove-parent"]').on('click', function () {
            $(this).parents($(this).data('parent')).remove();
        });
    });

</script>
@endsection
