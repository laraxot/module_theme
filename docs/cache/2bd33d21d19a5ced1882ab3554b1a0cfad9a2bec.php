<?php $__env->startSection('content'); ?><h1 id="getting-started">Getting Started</h1>

<p>This is a starter template for creating a beautiful, customizable documentation site for your project with minimal effort. You’ll only have to change a few settings and you’re ready to go.</p>

<h2 id="getting-started-configuration">Configuration</h2>

<p>As with all Jigsaw sites, configuration settings can be found in <code>config.php</code>; you can update the variables in that file with settings specific to your project. You can also add new configuration variables there to use across your site; take a look at the <a href="http://jigsaw.tighten.co/docs/site-variables/">Jigsaw documentation</a> to learn more.</p>

<pre><code class="language-php">// config.php
return [
    'baseUrl' =&gt; 'https://my-awesome-jigsaw-site.com/',
    'production' =&gt; false,
    'siteName' =&gt; 'My Site',
    'siteDescription' =&gt; 'Give your documentation a boost with Jigsaw.',
    'docsearchApiKey' =&gt; '',
    'docsearchIndexName' =&gt; '',
    'navigation' =&gt; require_once('navigation.php'),
];
</code></pre>

<blockquote>
  <p>Tip: This configuration file is also where you’ll define any "collections" (for example, a collection of the contributors to your site, or a collection of blog posts). Check out the official <a href="https://jigsaw.tighten.co/docs/collections/">Jigsaw documentation</a> to learn more.</p>
</blockquote>

<hr />

<h3 id="getting-started-adding-content">Adding Content</h3>

<p>You can write your content using a <a href="http://jigsaw.tighten.co/docs/content-other-file-types/">variety of file types</a>. By default, this starter template expects your content to be located in the <code>source/docs</code> folder. If you change this, be sure to update the URL references in <a href="/docs/navigation.php">navigation.php</a>.</p>

<p><a href="/docs/navigation">Read more about navigation.</a></p>

<p>The first section of each content page contains a YAML header that specifies how it should be rendered. The <code>title</code> attribute is used to dynamically generate HTML <code>title</code> and OpenGraph tags for each page. The <code>extends</code> attribute defines which parent Blade layout this content file will render with (e.g. <code>_layouts.documentation</code> will render with <code>source/_layouts/documentation.blade.php</code>), and the <code>section</code> attribute defines the Blade "section" that expects this content to be placed into it.</p>

<pre><code class="language-yaml">---
title: Navigation
description: Building a navigation menu for your site
extends: _layouts.documentation
section: content
---
</code></pre>

<p><a href="https://jigsaw.tighten.co/docs/content-blade/">Read more about Jigsaw layouts.</a></p>

<hr />

<h3 id="getting-started-adding-assets">Adding Assets</h3>

<p>Any assets that need to be compiled (such as JavaScript, Less, or Sass files) can be added to the <code>source/_assets/</code> directory, and Laravel Mix will process them when running <code>npm run dev</code> or <code>npm run prod</code>. The processed assets will be stored in <code>/source/assets/build/</code> (note there is no underscore on this second <code>assets</code> directory).</p>

<p>Then, when Jigsaw builds your site, the entire <code>/source/assets/</code> directory containing your built files (and any other directories containing static assets, such as images or fonts, that you choose to store there) will be copied to the destination build folders (<code>build_local</code>, on your local machine).</p>

<p>Files that don't require processing (such as images and fonts) can be added directly to <code>/source/assets/</code>.</p>

<p><a href="http://jigsaw.tighten.co/docs/compiling-assets/">Read more about compiling assets in Jigsaw using Laravel Mix.</a></p>

<hr />

<h2 id="getting-started-building-your-site">Building Your Site</h2>

<p>Now that you’ve edited your configuration variables and know how to customize your styles and content, let’s build the site.</p>

<pre><code class="language-bash"># build static files with Jigsaw
./vendor/bin/jigsaw build

# compile assets with Laravel Mix
# options: dev, prod
npm run dev
</code></pre>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>