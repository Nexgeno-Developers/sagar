@php
$frontend = DB::table('frontend_settings')->where('id', 1)->first();
$meta_description=$frontend->meta_description;
$meta_title=$frontend->meta_title;


$title = !empty(trim($__env->yieldContent('page.title'))) ? str_replace(['&nbsp;', '&amp;', '&amp;amp;'], ['&amp;', '&', '&'], htmlspecialchars_decode($__env->yieldContent('page.title'))) : 
$meta_title;

$description = !empty(trim($__env->yieldContent('page.description'))) ? str_replace(['&nbsp;', '&amp;', '&amp;amp;'], ['&amp;', '&', '&'], htmlspecialchars_decode($__env->yieldContent('page.description'))) :
$meta_description;

$page_type = !empty(trim($__env->yieldContent('page.type'))) ? $__env->yieldContent('page.type') : 'website';

$publish_time = !empty(trim($__env->yieldContent('page.publish_time'))) ? $__env->yieldContent('page.publish_time') :
'2023-09-18T13:41:39+00:00';

$url = url()->current();

@endphp


<title>@php echo htmlspecialchars_decode($title) @endphp</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="NEXGENO">

<meta name="title" content="@php echo htmlspecialchars_decode($title) @endphp">
<meta name="description" content="@php echo htmlspecialchars_decode($description) @endphp">

<meta property="og:url" content="{{ $url }}">
<meta property="og:type" content="{{ $page_type }}">
<meta property="og:site_name" content="{{ url('') }}">
<meta property="og:locale" content="en_US">

<meta property="og:title" content="@php echo htmlspecialchars_decode($title) @endphp">
<meta property="og:description" content="@php echo htmlspecialchars_decode($description) @endphp">

<meta property="article:publisher" content="https://www.facebook.com/" />
<meta property="article:modified_time" content="{{ $publish_time }}" />



<!----------------- og tag ------------------->

<meta property="og:image" content="{{ asset('assets/frontend/images/logo.png') }}">
<meta property="og:image:width" content="500">
<meta property="og:image:height" content="500">
<meta property="og:image:type" content="image/png" />

<!----------------- og tag ------------------->

<!----------------- twitter ------------------->

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Saagar">
<meta name="twitter:description" content="Saagar">
<meta name="twitter:image" content="{{ asset('assets/frontend/images/logo.png') }}">
<meta name="twitter:site" content="@sagar" />
<link rel="shortcut icon" href="{{ asset('/assets/frontend/images/favicon.webp') }}">

<!----------------- twitter ------------------->

<!----------------- canonical ------------------->

<link rel="canonical" href="{{ url()->current() }}">

<!----------------- canonical ------------------->

<!---------------- logo Schema ------------------->


  
<!---------------- logo schema end --------------->

<!---------------- Contact Address Schema ------------------->


@yield('page.schema')
  

<!---------------- Contact Address Schema end ------------------->



<base id="baseUrl" href="{{url('')}}">