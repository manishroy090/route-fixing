<?php echo '<?xml version="1.0" encoding="utf-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
      <loc>{{ route('home') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>1.00</priority>
   </url>

   <url>
      <loc>{{ route('frontend.aboutus') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>0.80</priority>
   </url>

   <url>
      <loc>{{ route('frontend.subscription-plans') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>0.80</priority>
   </url>

   <url>
      <loc>{{ route('frontend.blogs') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>0.80</priority>
   </url>

   <url>
      <loc>{{ route('frontend.video-tutorials') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>0.80</priority>
   </url>

   <url>
      <loc>{{ route('frontend.become-a-merchant') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>0.80</priority>
   </url>

   <url>
      <loc>{{ route('frontend.login') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>0.80</priority>
   </url>

   @if($blogs->isNotEmpty())
      @foreach($blogs as $blog)
         <url>
            <loc>{{ route('frontend.blogs_single',[$blog->blog_slug]) }}</loc>
            <lastmod>{{ $today }}</lastmod>
            <priority>0.80</priority>
         </url>
      @endforeach
   @endif

   <url>
      <loc>{{ route('frontend.clients') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>0.80</priority>
   </url>

   <url>
      <loc>{{ route('frontend.help_center') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>0.80</priority>
   </url>

   <url>
      <loc>{{ route('frontend.report') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>0.80</priority>
   </url>

   <url>
      <loc>{{ route('frontend.contact') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>0.80</priority>
   </url>

   @if($pages->isNotEmpty())
      @foreach($pages as $page)
         <url>
            <loc>{{ route('frontend.page',[$page->pages_slug]) }}</loc>
            <lastmod>{{ $today }}</lastmod>
            <priority>0.80</priority>
         </url>
      @endforeach
   @endif

   <url>
      <loc>{{ route('user.merchant.forgotPassword') }}</loc>
      <lastmod>{{ $today }}</lastmod>
      <priority>0.64</priority>
   </url>   
</urlset>
