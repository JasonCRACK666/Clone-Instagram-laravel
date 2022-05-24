@props(['hashtags'])

@php
  $tags = explode(',', $hashtags);
@endphp

<ul class="flex gap-1">
  @foreach ($tags as $tag)
  <li class="p-1 rounded hover:bg-blue-500 hover:text-white">
    <a href="/?hashtag={{$tag}}">#{{trim($tag)}}</a>
  </li>
  @endforeach
</ul>