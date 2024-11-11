<form id="edit_aboutus_form" action="{{url(route('custom-pages.update', $page->id))}}" method="post"
    enctype="multipart/form-data">
    @csrf
    @php
    if (!empty($page->content)) {
        $data = $page->content;
        $decoded_data = json_decode($data);

        //echo '<pre>';
        //print_r($decoded_data);
        //echo '</pre>';


        //exit();
        $about_content = $decoded_data->about_content ?? '';
        $core_content = $decoded_data->core_content ?? '';
        $policy_content = $decoded_data->policy_content ?? '';
        $about2_content1 = $decoded_data->about2_content1 ?? '';
        $about2_content2 = $decoded_data->about2_content2 ?? '';
        $mnv_description1 = $decoded_data->mnv_description1 ?? '';
        $mnv_description2 = $decoded_data->mnv_description2 ?? '';
        $about_image = $decoded_data->about_image ?? '';
        $core_image = $decoded_data->core_image ?? '';
        $policy_image = $decoded_data->policy_image ?? '';
        $mnv_image1 = $decoded_data->mnv_image1 ?? '';
        $mnv_image2 = $decoded_data->mnv_image2 ?? '';
        $mnv_bg_image1 = $decoded_data->mnv_bg_image1 ?? '';
        $mnv_bg_image2 = $decoded_data->mnv_bg_image2 ?? '';
        $about2_image1 = $decoded_data->about2_image1 ?? '';
        $about2_image2 = $decoded_data->about2_image2 ?? '';
        $teams = $decoded_data->team ?? '';


    } else {
        // If content is empty, set default empty values
        $about_content =  '';
        $core_content =  '';
        $policy_content =  '';
        $about2_content1 =  '';
        $about2_content2 =  '';
        $mnv_description1 =  '';
        $mnv_description2 =  '';
        $about_image =  '';
        $core_image =  '';
        $policy_image =  '';
        $mnv_image1 =  '';
        $mnv_image2 =  '';
        $mnv_bg_image1 =  '';
        $mnv_bg_image2 =  '';
        $about2_image1 =  '';
        $about2_image2 =  '';
        $teams =  '';
    }
@endphp

    <div class="row">
        <input type="hidden" name="id" value="{{ $page->id }}">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Title <span class="red">*</span></label>
                <input type="text" class="form-control" name="title"  maxlength="155" value="{{ $page->title }}" required>
            </div>
        </div>
        <div class="col-sm-6 d-none">
            <div class="form-group mb-3">
                <label>Slug (URL) <span class="red">*</span><span class="small"> (Deafult pages slug not editable) </span></label>
                <input readonly type="text" class="form-control"  maxlength="155" value="{{ $page->slug }}" name="slug" required>
            </div>
        </div>

        <div class="col-sm-6 d-none">
            <div class="form-group mb-3">
                <label>Status <span class="red">*</span><span class="small"> (Deafult Pages Status Not Editable) </span></label>
                <select class="pe-none form-select" name="is_active" required>
                    <option value="0" {{ $page->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                    <option value="1" {{ $page->is_active == 1 ? 'selected' : '' }}>Active</option>
                </select>
            </div>
        </div>
    <hr>
    <h3>About section</h3>
    <div class="row">
        <div class="col-sm-{{ !empty($about_image) ? 3 : 6 }}">
            <div class="form-group mb-3">
                <label>Image <span class="red">*</span></label>
                <input class="form-control" type="file" id="about_image" name="about_image" accept=".jpg,.jpeg,.png,.webp" @if (empty($about_image)) required @endif >
            </div>
        </div>
        @if (!empty($about_image))
            <div class="div-preview-image col-3 form-group mb-3">
                <input type="hidden" name="existing_about_image" value="{{ $about_image }}">
                <img width="180" src="{{ asset('storage/' . $about_image) }}">                                       
            </div>
        @endif

        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Description<span class="red">*</span></label>
                <textarea class="form-control trumbowyg" name="about_content" rows="3"  @if (empty($about_content)) required @endif>{{ $about_content }}</textarea>
            </div>
        </div>
    </div>
    <hr>
    <h3>Core Values section</h3>
    <div class="row">
        <div class="col-sm-{{ !empty($core_image) ? 3 : 6 }}">
            <div class="form-group mb-3">
                <label>Image <span class="red">*</span></label>
                <input class="form-control" type="file" id="core_image" name="core_image" accept=".jpg,.jpeg,.png,.webp" @if (empty($core_image)) required @endif >
            </div>
        </div>
        @if (!empty($core_image))
            <div class="div-preview-image col-3 form-group mb-3">
                <input type="hidden" name="existing_core_image" value="{{ $core_image }}">
                <img width="180" src="{{ asset('storage/' . $core_image) }}">                                       
            </div>
        @endif

        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Description<span class="red">*</span></label>
                <textarea class="form-control trumbowyg" name="core_content" rows="3"  @if (empty($core_content)) required @endif>{{ $core_content }}</textarea>
            </div>
        </div>
    </div>

    <hr>
    <h3>Policy section</h3>
    <div class="row">
        <div class="col-sm-{{ !empty($policy_image) ? 3 : 6 }}">
            <div class="form-group mb-3">
                <label>Image <span class="red">*</span></label>
                <input class="form-control" type="file" id="policy_image" name="policy_image" accept=".jpg,.jpeg,.png,.webp" @if (empty($policy_image)) required @endif >
            </div>
        </div>
        @if (!empty($policy_image))
            <div class="div-preview-image col-3 form-group mb-3">
                <input type="hidden" name="existing_policy_image" value="{{ $policy_image }}">
                <img width="180" src="{{ asset('storage/' . $policy_image) }}">                                       
            </div>
        @endif

        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Description<span class="red">*</span></label>
                <textarea class="form-control trumbowyg" name="policy_content" rows="3"  @if (empty($policy_content)) required @endif>{{ $policy_content }}</textarea>
            </div>
        </div>
    </div>

<hr>
<h3>Team section</h3>
        @if (!empty($teams))     
        @php
            $lastindex = is_array($teams) ? count($teams) : $teams->count();
        @endphp   
            @foreach ($teams as $index => $team)
                    <div class="row gallery-image-row">
                        <div class="col-md-9">
                            <div class="form-group row mb-3 ">
                                <div class="form-group mb-3 col-sm-{{ !empty($team->image) ? 9 : 12 }}">                                
                                    <label>Image <span class="red">*</span> </label>
                                    <input class="form-control" type="file" name="team_image[]"
                                        accept=".jpg,.jpeg,.png,.webp" @if (empty($team->image)) required @endif>
                                </div>
                                @if (!empty($team->image))
                                    <div class="div-preview-image col-3 form-group mb-3">
                                        <input type="hidden" name="existing_team_image[]" value="{{ $team->image }}">
                                        <img width="180" src="{{ asset('storage/' . $team->image) }}">                                       
                                    </div>
                                @endif
                                <div class="col-6 form-group mb-3">
                                    <label>Name<span class="red">*</span></label>
                                    <input type="text" class="form-control" name="team_name[]" value="{{$team->name}}" @if (empty($team->name)) required @endif>
                                </div>
                                <div class="col-6 form-group mb-3">
                                    <label>Description <span class="red">*</span> </label>
                                    <textarea class="form-control" name="team_description[]" rows="3" @if (empty($team->description)) required @endif>{{$team->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="add-row-col-3-div col-md-3">
                            @if ($index === 0 || $index === $lastindex - 1)
                                <button type="button" class="btn btn-outline-success add-row m-2">Add More +</button>
                            @endif
                            @if ($index > 0)
                            <button type="button" class="btn btn-outline-danger remove-row my-2">Remove</button>
                            @endif
                        </div>
                    </div>
            @endforeach
        @else
            <div class="row gallery-image-row">
                <div class="col-md-9">
                    <div class="form-group row mb-3 ">
                        <div class="col-12 form-group mb-3">
                            <label>Image <span class="red">*</span></label>
                            <input class="form-control" type="file" name="team_image[]" accept=".jpg,.jpeg,.png,.webp" required>
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label>Name <span class="red">*</span></label>
                            <input type="text" class="form-control" name="team_name[]" required>
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label>Description <span class="red">*</span> </label>
                            <textarea class="form-control" name="team_description[]" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="add-row-col-3-div col-md-3">
                    <button type="button" class="btn btn-outline-success add-row my-2">Add More +</button>
                </div>
            </div>
        @endif

        <hr>
        <h3>About Section 2</h3>        
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label>About Content<span class="red">*</span></label>
                    <textarea class="form-control trumbowyg" name="about2_content1" rows="3"  @if (empty($about2_content1)) required @endif>{{ $about2_content1 }}</textarea>
                </div> 
            </div>
            <div class="col-sm-{{ !empty($about2_image1) ? 3 : 6 }}">
                <div class="form-group mb-3">
                    <label>About image <span class="red">*</span> </label>
                    <input class="form-control" type="file" id="about2_image1" name="about2_image1" accept=".jpg,.jpeg,.png,.webp" @if (empty($about2_image1)) required @endif >
                </div>
            </div>
            @if (!empty($about2_image1))
                <div class="div-preview-image col-3 form-group mb-3">
                    <input type="hidden" name="existing_about2_image1" value="{{ $about2_image1 }}">
                    <img width="180" src="{{ asset('storage/' . $about2_image1) }}">                                       
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-sm-{{ !empty($about2_image2) ? 3 : 6 }}">
                <div class="form-group mb-3">
                    <label>About image  <span class="red">*</span></label>
                    <input class="form-control" type="file" name="about2_image2" accept=".jpg,.jpeg,.png,.webp" @if (empty($about2_image2)) required @endif >
                </div>
            </div>
            @if (!empty($about2_image2))
                <div class="div-preview-image col-3 form-group mb-3">
                    <input type="hidden" name="existing_about2_image2" value="{{ $about2_image2 }}">
                    <img width="180" src="{{ asset('storage/' . $about2_image2) }}">                                       
                </div>
            @endif

            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label>About Content <span class="red">*</span></label>
                    <textarea class="form-control trumbowyg" name="about2_content2" rows="3"  @if (empty($about2_content2)) required @endif>{{ $about2_content2 }}</textarea>
                </div> 
            </div>
        </div>

        
        <hr>
        <h3> Mission and Vision Section</h3>        
            <div class="row gallery-image-row2">
                <div class="col-md-12">
                    <div class="form-group row mb-3">
                        <div class="col-sm-{{ !empty($mnv_image1) ? 3 : 6 }}">
                            <div class="form-group mb-3">
                                <label>Image<span class="red">*</span></label>
                                <input class="form-control" type="file" name="mnv_image1" accept=".jpg,.jpeg,.png,.webp" @if (empty($mnv_image1)) required @endif >
                            </div>
                        </div>
                        @if (!empty($mnv_image1))
                            <div class="div-preview-image col-3 form-group mb-3">
                                <input type="hidden" name="existing_mnv_image1" value="{{ $mnv_image1 }}">
                                <img width="180" src="{{ asset('storage/' . $mnv_image1) }}">                                       
                            </div>
                        @endif
                        <div class="col-6 form-group mb-3">
                            <label>Description</label>
                            <textarea class="form-control" name="mnv_description1" maxlength="155" rows="3" required>{{$mnv_description1}}</textarea>
                        </div>
                        <div class="col-sm-{{ !empty($mnv_bg_image1) ? 3 : 6 }}">
                            <div class="form-group mb-3">
                                <label>Background Image</label>
                                <input class="form-control" type="file" name="mnv_bg_image1" accept=".jpg,.jpeg,.png,.webp" @if (empty($mnv_bg_image1)) required @endif >
                            </div>
                        </div>
                        @if (!empty($mnv_bg_image1))
                            <div class="div-preview-image col-3 form-group mb-3">
                                <input type="hidden" name="existing_mnv_bg_image1" value="{{ $mnv_bg_image1 }}">
                                <img width="180" src="{{ asset('storage/' . $mnv_bg_image1) }}">                                       
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="row gallery-image-row2">
                <div class="col-md-12">
                    <div class="form-group row mb-3">
                        <div class="col-sm-{{ !empty($mnv_image2) ? 3 : 6 }}">
                            <div class="form-group mb-3">
                                <label>Image</label>
                                <input class="form-control" type="file" name="mnv_image2" accept=".jpg,.jpeg,.png,.webp" @if (empty($mnv_image2)) required @endif >
                            </div>
                        </div>
                        @if (!empty($mnv_image2))
                            <div class="div-preview-image col-3 form-group mb-3">
                                <input type="hidden" name="existing_mnv_image2" value="{{ $mnv_image2 }}">
                                <img width="180" src="{{ asset('storage/' . $mnv_image2) }}">                                       
                            </div>
                        @endif
                        <div class="col-6 form-group mb-3">
                            <label>Description</label>
                            <textarea class="form-control" name="mnv_description2" maxlength="155" rows="3" required>{{$mnv_description2}}</textarea>
                        </div>
                        <div class="col-sm-{{ !empty($mnv_bg_image2) ? 3 : 6 }}">
                            <div class="form-group mb-3">
                                <label>Background Image</label>
                                <input class="form-control" type="file" name="mnv_bg_image2" accept=".jpg,.jpeg,.png,.webp" @if (empty($mnv_bg_image2)) required @endif >
                            </div>
                        </div>
                        @if (!empty($mnv_bg_image2))
                            <div class="div-preview-image col-3 form-group mb-3">
                                <input type="hidden" name="existing_mnv_bg_image2" value="{{ $mnv_bg_image2 }}">
                                <img width="180" src="{{ asset('storage/' . $mnv_bg_image2) }}">                                       
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
      


        <hr>
        <h3>Seo Section</h3>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Meta Title<span class="red">*</span></label>
                <input type="text" class="form-control"  maxlength="255" name="meta_title" value="{{ $page->meta_title }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Meta Description<span class="red">*</span></label>
                <textarea class="form-control"  maxlength="255" name="meta_description" rows="3" required>{{ $page->meta_description }}</textarea>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group mb-3 text-end">
                <button type="submit" class="btn btn-block btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
    initValidate('#edit_aboutus_form');

    $("#edit_aboutus_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }
    // Add row functionality for Banner Section
    $(document).on('click', '.add-row', function() {
        var newRow = $('.gallery-image-row').first().clone();
        newRow.find('input, textarea').val('');
        newRow.find('.add-row-col-3-div').remove();
        newRow.find('.div-preview-image ').remove();
        newRow.append(
            '<div class="col-md-3"><button type="button" class="btn btn-outline-success add-row m-2">Add More +</button><button type="button" class="btn btn-outline-danger remove-row my-2">Remove</button></div>'
            );
        $('.gallery-image-row').last().after(newRow);
    });

    // Remove row functionality for Banner Section
    $(document).on('click', '.remove-row', function() {
        if ($('.gallery-image-row').length > 1) {
            $(this).closest('.gallery-image-row').remove();
        } else {
            alert('At least one row is required.');
        }
    });

});
</script>