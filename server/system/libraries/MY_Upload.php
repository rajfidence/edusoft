




<!DOCTYPE html>
<html class="   ">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    
    <title>CodeIgniter-Multi-Upload/MY_Upload.php at master · stvnthomas/CodeIgniter-Multi-Upload · GitHub</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub" />
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png" />
    <meta property="fb:app_id" content="1401488693436528"/>

      <meta content="@github" name="twitter:site" /><meta content="summary" name="twitter:card" /><meta content="stvnthomas/CodeIgniter-Multi-Upload" name="twitter:title" /><meta content="CodeIgniter-Multi-Upload - Multiple file upload support for CodeIgniter 2.x." name="twitter:description" /><meta content="https://avatars0.githubusercontent.com/u/2236267?s=400" name="twitter:image:src" />
<meta content="GitHub" property="og:site_name" /><meta content="object" property="og:type" /><meta content="https://avatars0.githubusercontent.com/u/2236267?s=400" property="og:image" /><meta content="stvnthomas/CodeIgniter-Multi-Upload" property="og:title" /><meta content="https://github.com/stvnthomas/CodeIgniter-Multi-Upload" property="og:url" /><meta content="CodeIgniter-Multi-Upload - Multiple file upload support for CodeIgniter 2.x." property="og:description" />

    <link rel="assets" href="https://github.global.ssl.fastly.net/">
    <link rel="conduit-xhr" href="https://ghconduit.com:25035/">
    <link rel="xhr-socket" href="/_sockets" />

    <meta name="msapplication-TileImage" content="/windows-tile.png" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="selected-link" value="repo_source" data-pjax-transient />
    <meta content="collector.githubapp.com" name="octolytics-host" /><meta content="collector-cdn.github.com" name="octolytics-script-host" /><meta content="github" name="octolytics-app-id" /><meta content="728F575D:4A38:8428317:535A2C04" name="octolytics-dimension-request_id" />
    

    
    
    <link rel="icon" type="image/x-icon" href="https://github.global.ssl.fastly.net/favicon.ico" />

    <meta content="authenticity_token" name="csrf-param" />
<meta content="pLspSuZx2oU+guLo/9fANpsUBkkC99TIAtObjvt/and9zWOV39KJ30wvTmj2pH40jfWA/NFTHt7EK5sG3aJxhA==" name="csrf-token" />

    <link href="https://github.global.ssl.fastly.net/assets/github-0fccb0d1330ec12e83e33d762026ca69cd2b6862.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://github.global.ssl.fastly.net/assets/github2-50d481402ffe2c088905b9982f2846f5f1be9b43.css" media="all" rel="stylesheet" type="text/css" />
    


        <script crossorigin="anonymous" src="https://github.global.ssl.fastly.net/assets/frameworks-f8f8d8ee1afb4365ba5e002fdbc3c8e61738713b.js" type="text/javascript"></script>
        <script async="async" crossorigin="anonymous" src="https://github.global.ssl.fastly.net/assets/github-0dce5cbbd453992693347ff7a62aa955cf152870.js" type="text/javascript"></script>
        
        
      <meta http-equiv="x-pjax-version" content="f8ae4599f3ae8a183e55831ae86406ce">

        <link data-pjax-transient rel='permalink' href='/stvnthomas/CodeIgniter-Multi-Upload/blob/efc3dbb7e2fc2bdbfb636d76af5a9432204b3ee7/MY_Upload.php'>

  <meta name="description" content="CodeIgniter-Multi-Upload - Multiple file upload support for CodeIgniter 2.x." />

  <meta content="2236267" name="octolytics-dimension-user_id" /><meta content="stvnthomas" name="octolytics-dimension-user_login" /><meta content="5590060" name="octolytics-dimension-repository_id" /><meta content="stvnthomas/CodeIgniter-Multi-Upload" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="5590060" name="octolytics-dimension-repository_network_root_id" /><meta content="stvnthomas/CodeIgniter-Multi-Upload" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/stvnthomas/CodeIgniter-Multi-Upload/commits/master.atom" rel="alternate" title="Recent Commits to CodeIgniter-Multi-Upload:master" type="application/atom+xml" />

  </head>


  <body class="logged_out  env-production windows vis-public page-blob">
    <a href="#start-of-content" tabindex="1" class="accessibility-aid js-skip-to-content">Skip to content</a>
    <div class="wrapper">
      
      
      
      


      
      <div class="header header-logged-out">
  <div class="container clearfix">

    <a class="header-logo-wordmark" href="https://github.com/">
      <span class="mega-octicon octicon-logo-github"></span>
    </a>

    <div class="header-actions">
        <a class="button primary" href="/join">Sign up</a>
      <a class="button signin" href="/login?return_to=%2Fstvnthomas%2FCodeIgniter-Multi-Upload%2Fblob%2Fmaster%2FMY_Upload.php">Sign in</a>
    </div>

    <div class="command-bar js-command-bar  in-repository">

      <ul class="top-nav">
          <li class="explore"><a href="/explore">Explore</a></li>
        <li class="features"><a href="/features">Features</a></li>
          <li class="enterprise"><a href="https://enterprise.github.com/">Enterprise</a></li>
          <li class="blog"><a href="/blog">Blog</a></li>
      </ul>
        <form accept-charset="UTF-8" action="/search" class="command-bar-form" id="top_search_form" method="get">

<div class="commandbar">
  <span class="message"></span>
  <input type="text" data-hotkey="/ s" name="q" id="js-command-bar-field" placeholder="Search or type a command" tabindex="1" autocapitalize="off"
    
    
      data-repo="stvnthomas/CodeIgniter-Multi-Upload"
      data-branch="master"
      data-sha="f2386233257130d2f8dd5b274090505bfb99b6fa"
  >
  <div class="display hidden"></div>
</div>

    <input type="hidden" name="nwo" value="stvnthomas/CodeIgniter-Multi-Upload" />

    <div class="select-menu js-menu-container js-select-menu search-context-select-menu">
      <span class="minibutton select-menu-button js-menu-target" role="button" aria-haspopup="true">
        <span class="js-select-button">This repository</span>
      </span>

      <div class="select-menu-modal-holder js-menu-content js-navigation-container" aria-hidden="true">
        <div class="select-menu-modal">

          <div class="select-menu-item js-navigation-item js-this-repository-navigation-item selected">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" class="js-search-this-repository" name="search_target" value="repository" checked="checked" />
            <div class="select-menu-item-text js-select-button-text">This repository</div>
          </div> <!-- /.select-menu-item -->

          <div class="select-menu-item js-navigation-item js-all-repositories-navigation-item">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" name="search_target" value="global" />
            <div class="select-menu-item-text js-select-button-text">All repositories</div>
          </div> <!-- /.select-menu-item -->

        </div>
      </div>
    </div>

  <span class="help tooltipped tooltipped-s" aria-label="Show command bar help">
    <span class="octicon octicon-question"></span>
  </span>


  <input type="hidden" name="ref" value="cmdform">

</form>
    </div>

  </div>
</div>



      <div id="start-of-content" class="accessibility-aid"></div>
          <div class="site" itemscope itemtype="http://schema.org/WebPage">
    <div id="js-flash-container">
      
    </div>
    <div class="pagehead repohead instapaper_ignore readability-menu">
      <div class="container">
        

<ul class="pagehead-actions">


  <li>
    <a href="/login?return_to=%2Fstvnthomas%2FCodeIgniter-Multi-Upload"
    class="minibutton with-count js-toggler-target star-button tooltipped tooltipped-n"
    aria-label="You must be signed in to star a repository" rel="nofollow">
    <span class="octicon octicon-star"></span>Star
  </a>

    <a class="social-count js-social-count" href="/stvnthomas/CodeIgniter-Multi-Upload/stargazers">
      34
    </a>

  </li>

    <li>
      <a href="/login?return_to=%2Fstvnthomas%2FCodeIgniter-Multi-Upload"
        class="minibutton with-count js-toggler-target fork-button tooltipped tooltipped-n"
        aria-label="You must be signed in to fork a repository" rel="nofollow">
        <span class="octicon octicon-git-branch"></span>Fork
      </a>
      <a href="/stvnthomas/CodeIgniter-Multi-Upload/network" class="social-count">
        44
      </a>
    </li>
</ul>

        <h1 itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="entry-title public">
          <span class="repo-label"><span>public</span></span>
          <span class="mega-octicon octicon-repo"></span>
          <span class="author"><a href="/stvnthomas" class="url fn" itemprop="url" rel="author"><span itemprop="title">stvnthomas</span></a></span><!--
       --><span class="path-divider">/</span><!--
       --><strong><a href="/stvnthomas/CodeIgniter-Multi-Upload" class="js-current-repository js-repo-home-link">CodeIgniter-Multi-Upload</a></strong>

          <span class="page-context-loader">
            <img alt="Octocat-spinner-32" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
          </span>

        </h1>
      </div><!-- /.container -->
    </div><!-- /.repohead -->

    <div class="container">
      <div class="repository-with-sidebar repo-container new-discussion-timeline js-new-discussion-timeline  ">
        <div class="repository-sidebar clearfix">
            

<div class="sunken-menu vertical-right repo-nav js-repo-nav js-repository-container-pjax js-octicon-loaders">
  <div class="sunken-menu-contents">
    <ul class="sunken-menu-group">
      <li class="tooltipped tooltipped-w" aria-label="Code">
        <a href="/stvnthomas/CodeIgniter-Multi-Upload" aria-label="Code" class="selected js-selected-navigation-item sunken-menu-item" data-gotokey="c" data-pjax="true" data-selected-links="repo_source repo_downloads repo_commits repo_tags repo_branches /stvnthomas/CodeIgniter-Multi-Upload">
          <span class="octicon octicon-code"></span> <span class="full-word">Code</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

        <li class="tooltipped tooltipped-w" aria-label="Issues">
          <a href="/stvnthomas/CodeIgniter-Multi-Upload/issues" aria-label="Issues" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="i" data-selected-links="repo_issues /stvnthomas/CodeIgniter-Multi-Upload/issues">
            <span class="octicon octicon-issue-opened"></span> <span class="full-word">Issues</span>
            <span class='counter'>5</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>        </li>

      <li class="tooltipped tooltipped-w" aria-label="Pull Requests">
        <a href="/stvnthomas/CodeIgniter-Multi-Upload/pulls" aria-label="Pull Requests" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="p" data-selected-links="repo_pulls /stvnthomas/CodeIgniter-Multi-Upload/pulls">
            <span class="octicon octicon-git-pull-request"></span> <span class="full-word">Pull Requests</span>
            <span class='counter'>0</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>


    </ul>
    <div class="sunken-menu-separator"></div>
    <ul class="sunken-menu-group">

      <li class="tooltipped tooltipped-w" aria-label="Pulse">
        <a href="/stvnthomas/CodeIgniter-Multi-Upload/pulse" aria-label="Pulse" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="pulse /stvnthomas/CodeIgniter-Multi-Upload/pulse">
          <span class="octicon octicon-pulse"></span> <span class="full-word">Pulse</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped tooltipped-w" aria-label="Graphs">
        <a href="/stvnthomas/CodeIgniter-Multi-Upload/graphs" aria-label="Graphs" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="repo_graphs repo_contributors /stvnthomas/CodeIgniter-Multi-Upload/graphs">
          <span class="octicon octicon-graph"></span> <span class="full-word">Graphs</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped tooltipped-w" aria-label="Network">
        <a href="/stvnthomas/CodeIgniter-Multi-Upload/network" aria-label="Network" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-selected-links="repo_network /stvnthomas/CodeIgniter-Multi-Upload/network">
          <span class="octicon octicon-git-branch"></span> <span class="full-word">Network</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>
    </ul>


  </div>
</div>

              <div class="only-with-full-nav">
                

  

<div class="clone-url open"
  data-protocol-type="http"
  data-url="/users/set_protocol?protocol_selector=http&amp;protocol_type=clone">
  <h3><strong>HTTPS</strong> clone URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/stvnthomas/CodeIgniter-Multi-Upload.git" readonly="readonly">

    <span aria-label="copy to clipboard" class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/stvnthomas/CodeIgniter-Multi-Upload.git" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>

  

<div class="clone-url "
  data-protocol-type="subversion"
  data-url="/users/set_protocol?protocol_selector=subversion&amp;protocol_type=clone">
  <h3><strong>Subversion</strong> checkout URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/stvnthomas/CodeIgniter-Multi-Upload" readonly="readonly">

    <span aria-label="copy to clipboard" class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/stvnthomas/CodeIgniter-Multi-Upload" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


<p class="clone-options">You can clone with
      <a href="#" class="js-clone-selector" data-protocol="http">HTTPS</a>
      or <a href="#" class="js-clone-selector" data-protocol="subversion">Subversion</a>.
  <span class="help tooltipped tooltipped-n" aria-label="Get help on which URL is right for you.">
    <a href="https://help.github.com/articles/which-remote-url-should-i-use">
    <span class="octicon octicon-question"></span>
    </a>
  </span>
</p>


  <a href="http://windows.github.com" class="minibutton sidebar-button" title="Save stvnthomas/CodeIgniter-Multi-Upload to your computer and use it in GitHub Desktop." aria-label="Save stvnthomas/CodeIgniter-Multi-Upload to your computer and use it in GitHub Desktop.">
    <span class="octicon octicon-device-desktop"></span>
    Clone in Desktop
  </a>

                <a href="/stvnthomas/CodeIgniter-Multi-Upload/archive/master.zip"
                   class="minibutton sidebar-button"
                   aria-label="Download stvnthomas/CodeIgniter-Multi-Upload as a zip file"
                   title="Download stvnthomas/CodeIgniter-Multi-Upload as a zip file"
                   rel="nofollow">
                  <span class="octicon octicon-cloud-download"></span>
                  Download ZIP
                </a>
              </div>
        </div><!-- /.repository-sidebar -->

        <div id="js-repo-pjax-container" class="repository-content context-loader-container" data-pjax-container>
          


<!-- blob contrib key: blob_contributors:v21:07f17f31d8e131d529f07fea26f39228 -->

<p title="This is a placeholder element" class="js-history-link-replace hidden"></p>

<a href="/stvnthomas/CodeIgniter-Multi-Upload/find/master" data-pjax data-hotkey="t" class="js-show-file-finder" style="display:none">Show File Finder</a>

<div class="file-navigation">
  

<div class="select-menu js-menu-container js-select-menu" >
  <span class="minibutton select-menu-button js-menu-target" data-hotkey="w"
    data-master-branch="master"
    data-ref="master"
    role="button" aria-label="Switch branches or tags" tabindex="0" aria-haspopup="true">
    <span class="octicon octicon-git-branch"></span>
    <i>branch:</i>
    <span class="js-select-button">master</span>
  </span>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax aria-hidden="true">

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <span class="select-menu-title">Switch branches/tags</span>
        <span class="octicon octicon-remove-close js-menu-close"></span>
      </div> <!-- /.select-menu-header -->

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Filter branches/tags" id="context-commitish-filter-field" class="js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" class="js-select-menu-tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" class="js-select-menu-tab">Tags</a>
            </li>
          </ul>
        </div><!-- /.select-menu-tabs -->
      </div><!-- /.select-menu-filters -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/stvnthomas/CodeIgniter-Multi-Upload/blob/development/MY_Upload.php"
                 data-name="development"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="development">development</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item selected">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/stvnthomas/CodeIgniter-Multi-Upload/blob/master/MY_Upload.php"
                 data-name="master"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="master">master</a>
            </div> <!-- /.select-menu-item -->
        </div>

          <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

    </div> <!-- /.select-menu-modal -->
  </div> <!-- /.select-menu-modal-holder -->
</div> <!-- /.select-menu -->

  <div class="breadcrumb">
    <span class='repo-root js-repo-root'><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/stvnthomas/CodeIgniter-Multi-Upload" data-branch="master" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">CodeIgniter-Multi-Upload</span></a></span></span><span class="separator"> / </span><strong class="final-path">MY_Upload.php</strong> <span aria-label="copy to clipboard" class="js-zeroclipboard minibutton zeroclipboard-button" data-clipboard-text="MY_Upload.php" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


  <div class="commit file-history-tease">
    <img class="main-avatar" height="24" src="https://2.gravatar.com/avatar/704adc87a74d401578332a64324de5f0?d=https%3A%2F%2Fa248.e.akamai.net%2Fassets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png&amp;r=x&amp;s=140" width="24" />
    <span class="author"><span rel="author">Steven Thomas</span></span>
    <local-time datetime="2014-04-24T09:19:44-07:00" from="now" title-format="%Y-%m-%d %H:%M:%S %z" title="2014-04-24 09:19:44 -0700">April 24, 2014</local-time>
    <div class="commit-title">
        <a href="/stvnthomas/CodeIgniter-Multi-Upload/commit/efc3dbb7e2fc2bdbfb636d76af5a9432204b3ee7" class="message" data-pjax="true" title="Changed $_multi_upload_data to clear on each calling of the do_multi_upload() method.">Changed $_multi_upload_data to clear on each calling of the do_multi_…</a>
    </div>

    <div class="participation">
      <p class="quickstat"><a href="#blob_contributors_box" rel="facebox"><strong>1</strong>  contributor</a></p>
      
    </div>
    <div id="blob_contributors_box" style="display:none">
      <h2 class="facebox-header">Users who have contributed to this file</h2>
      <ul class="facebox-user-list">
          <li class="facebox-user-list-item">
            <img alt="Steven Thomas" class=" js-avatar" data-user="2236267" height="24" src="https://avatars3.githubusercontent.com/u/2236267?s=140" width="24" />
            <a href="/stvnthomas">stvnthomas</a>
          </li>
      </ul>
    </div>
  </div>

<div class="file-box">
  <div class="file">
    <div class="meta clearfix">
      <div class="info file-name">
        <span class="icon"><b class="octicon octicon-file-text"></b></span>
        <span class="mode" title="File Mode">file</span>
        <span class="meta-divider"></span>
          <span>445 lines (396 sloc)</span>
          <span class="meta-divider"></span>
        <span>15.086 kb</span>
      </div>
      <div class="actions">
        <div class="button-group">
            <a class="minibutton tooltipped tooltipped-w"
               href="http://windows.github.com" aria-label="Open this file in GitHub for Windows">
                <span class="octicon octicon-device-desktop"></span> Open
            </a>
              <a class="minibutton disabled tooltipped tooltipped-w" href="#"
                 aria-label="You must be signed in to make or propose changes">Edit</a>
          <a href="/stvnthomas/CodeIgniter-Multi-Upload/raw/master/MY_Upload.php" class="button minibutton " id="raw-url">Raw</a>
            <a href="/stvnthomas/CodeIgniter-Multi-Upload/blame/master/MY_Upload.php" class="button minibutton js-update-url-with-hash">Blame</a>
          <a href="/stvnthomas/CodeIgniter-Multi-Upload/commits/master/MY_Upload.php" class="button minibutton " rel="nofollow">History</a>
        </div><!-- /.button-group -->
          <a class="minibutton danger disabled empty-icon tooltipped tooltipped-w" href="#"
             aria-label="You must be signed in to make or propose changes">
          Delete
        </a>
      </div><!-- /.actions -->
    </div>
        <div class="blob-wrapper data type-php js-blob-data">
        <table class="file-code file-diff tab-size-8">
          <tr class="file-code-line">
            <td class="blob-line-nums">
              <span id="L1" rel="#L1">1</span>
<span id="L2" rel="#L2">2</span>
<span id="L3" rel="#L3">3</span>
<span id="L4" rel="#L4">4</span>
<span id="L5" rel="#L5">5</span>
<span id="L6" rel="#L6">6</span>
<span id="L7" rel="#L7">7</span>
<span id="L8" rel="#L8">8</span>
<span id="L9" rel="#L9">9</span>
<span id="L10" rel="#L10">10</span>
<span id="L11" rel="#L11">11</span>
<span id="L12" rel="#L12">12</span>
<span id="L13" rel="#L13">13</span>
<span id="L14" rel="#L14">14</span>
<span id="L15" rel="#L15">15</span>
<span id="L16" rel="#L16">16</span>
<span id="L17" rel="#L17">17</span>
<span id="L18" rel="#L18">18</span>
<span id="L19" rel="#L19">19</span>
<span id="L20" rel="#L20">20</span>
<span id="L21" rel="#L21">21</span>
<span id="L22" rel="#L22">22</span>
<span id="L23" rel="#L23">23</span>
<span id="L24" rel="#L24">24</span>
<span id="L25" rel="#L25">25</span>
<span id="L26" rel="#L26">26</span>
<span id="L27" rel="#L27">27</span>
<span id="L28" rel="#L28">28</span>
<span id="L29" rel="#L29">29</span>
<span id="L30" rel="#L30">30</span>
<span id="L31" rel="#L31">31</span>
<span id="L32" rel="#L32">32</span>
<span id="L33" rel="#L33">33</span>
<span id="L34" rel="#L34">34</span>
<span id="L35" rel="#L35">35</span>
<span id="L36" rel="#L36">36</span>
<span id="L37" rel="#L37">37</span>
<span id="L38" rel="#L38">38</span>
<span id="L39" rel="#L39">39</span>
<span id="L40" rel="#L40">40</span>
<span id="L41" rel="#L41">41</span>
<span id="L42" rel="#L42">42</span>
<span id="L43" rel="#L43">43</span>
<span id="L44" rel="#L44">44</span>
<span id="L45" rel="#L45">45</span>
<span id="L46" rel="#L46">46</span>
<span id="L47" rel="#L47">47</span>
<span id="L48" rel="#L48">48</span>
<span id="L49" rel="#L49">49</span>
<span id="L50" rel="#L50">50</span>
<span id="L51" rel="#L51">51</span>
<span id="L52" rel="#L52">52</span>
<span id="L53" rel="#L53">53</span>
<span id="L54" rel="#L54">54</span>
<span id="L55" rel="#L55">55</span>
<span id="L56" rel="#L56">56</span>
<span id="L57" rel="#L57">57</span>
<span id="L58" rel="#L58">58</span>
<span id="L59" rel="#L59">59</span>
<span id="L60" rel="#L60">60</span>
<span id="L61" rel="#L61">61</span>
<span id="L62" rel="#L62">62</span>
<span id="L63" rel="#L63">63</span>
<span id="L64" rel="#L64">64</span>
<span id="L65" rel="#L65">65</span>
<span id="L66" rel="#L66">66</span>
<span id="L67" rel="#L67">67</span>
<span id="L68" rel="#L68">68</span>
<span id="L69" rel="#L69">69</span>
<span id="L70" rel="#L70">70</span>
<span id="L71" rel="#L71">71</span>
<span id="L72" rel="#L72">72</span>
<span id="L73" rel="#L73">73</span>
<span id="L74" rel="#L74">74</span>
<span id="L75" rel="#L75">75</span>
<span id="L76" rel="#L76">76</span>
<span id="L77" rel="#L77">77</span>
<span id="L78" rel="#L78">78</span>
<span id="L79" rel="#L79">79</span>
<span id="L80" rel="#L80">80</span>
<span id="L81" rel="#L81">81</span>
<span id="L82" rel="#L82">82</span>
<span id="L83" rel="#L83">83</span>
<span id="L84" rel="#L84">84</span>
<span id="L85" rel="#L85">85</span>
<span id="L86" rel="#L86">86</span>
<span id="L87" rel="#L87">87</span>
<span id="L88" rel="#L88">88</span>
<span id="L89" rel="#L89">89</span>
<span id="L90" rel="#L90">90</span>
<span id="L91" rel="#L91">91</span>
<span id="L92" rel="#L92">92</span>
<span id="L93" rel="#L93">93</span>
<span id="L94" rel="#L94">94</span>
<span id="L95" rel="#L95">95</span>
<span id="L96" rel="#L96">96</span>
<span id="L97" rel="#L97">97</span>
<span id="L98" rel="#L98">98</span>
<span id="L99" rel="#L99">99</span>
<span id="L100" rel="#L100">100</span>
<span id="L101" rel="#L101">101</span>
<span id="L102" rel="#L102">102</span>
<span id="L103" rel="#L103">103</span>
<span id="L104" rel="#L104">104</span>
<span id="L105" rel="#L105">105</span>
<span id="L106" rel="#L106">106</span>
<span id="L107" rel="#L107">107</span>
<span id="L108" rel="#L108">108</span>
<span id="L109" rel="#L109">109</span>
<span id="L110" rel="#L110">110</span>
<span id="L111" rel="#L111">111</span>
<span id="L112" rel="#L112">112</span>
<span id="L113" rel="#L113">113</span>
<span id="L114" rel="#L114">114</span>
<span id="L115" rel="#L115">115</span>
<span id="L116" rel="#L116">116</span>
<span id="L117" rel="#L117">117</span>
<span id="L118" rel="#L118">118</span>
<span id="L119" rel="#L119">119</span>
<span id="L120" rel="#L120">120</span>
<span id="L121" rel="#L121">121</span>
<span id="L122" rel="#L122">122</span>
<span id="L123" rel="#L123">123</span>
<span id="L124" rel="#L124">124</span>
<span id="L125" rel="#L125">125</span>
<span id="L126" rel="#L126">126</span>
<span id="L127" rel="#L127">127</span>
<span id="L128" rel="#L128">128</span>
<span id="L129" rel="#L129">129</span>
<span id="L130" rel="#L130">130</span>
<span id="L131" rel="#L131">131</span>
<span id="L132" rel="#L132">132</span>
<span id="L133" rel="#L133">133</span>
<span id="L134" rel="#L134">134</span>
<span id="L135" rel="#L135">135</span>
<span id="L136" rel="#L136">136</span>
<span id="L137" rel="#L137">137</span>
<span id="L138" rel="#L138">138</span>
<span id="L139" rel="#L139">139</span>
<span id="L140" rel="#L140">140</span>
<span id="L141" rel="#L141">141</span>
<span id="L142" rel="#L142">142</span>
<span id="L143" rel="#L143">143</span>
<span id="L144" rel="#L144">144</span>
<span id="L145" rel="#L145">145</span>
<span id="L146" rel="#L146">146</span>
<span id="L147" rel="#L147">147</span>
<span id="L148" rel="#L148">148</span>
<span id="L149" rel="#L149">149</span>
<span id="L150" rel="#L150">150</span>
<span id="L151" rel="#L151">151</span>
<span id="L152" rel="#L152">152</span>
<span id="L153" rel="#L153">153</span>
<span id="L154" rel="#L154">154</span>
<span id="L155" rel="#L155">155</span>
<span id="L156" rel="#L156">156</span>
<span id="L157" rel="#L157">157</span>
<span id="L158" rel="#L158">158</span>
<span id="L159" rel="#L159">159</span>
<span id="L160" rel="#L160">160</span>
<span id="L161" rel="#L161">161</span>
<span id="L162" rel="#L162">162</span>
<span id="L163" rel="#L163">163</span>
<span id="L164" rel="#L164">164</span>
<span id="L165" rel="#L165">165</span>
<span id="L166" rel="#L166">166</span>
<span id="L167" rel="#L167">167</span>
<span id="L168" rel="#L168">168</span>
<span id="L169" rel="#L169">169</span>
<span id="L170" rel="#L170">170</span>
<span id="L171" rel="#L171">171</span>
<span id="L172" rel="#L172">172</span>
<span id="L173" rel="#L173">173</span>
<span id="L174" rel="#L174">174</span>
<span id="L175" rel="#L175">175</span>
<span id="L176" rel="#L176">176</span>
<span id="L177" rel="#L177">177</span>
<span id="L178" rel="#L178">178</span>
<span id="L179" rel="#L179">179</span>
<span id="L180" rel="#L180">180</span>
<span id="L181" rel="#L181">181</span>
<span id="L182" rel="#L182">182</span>
<span id="L183" rel="#L183">183</span>
<span id="L184" rel="#L184">184</span>
<span id="L185" rel="#L185">185</span>
<span id="L186" rel="#L186">186</span>
<span id="L187" rel="#L187">187</span>
<span id="L188" rel="#L188">188</span>
<span id="L189" rel="#L189">189</span>
<span id="L190" rel="#L190">190</span>
<span id="L191" rel="#L191">191</span>
<span id="L192" rel="#L192">192</span>
<span id="L193" rel="#L193">193</span>
<span id="L194" rel="#L194">194</span>
<span id="L195" rel="#L195">195</span>
<span id="L196" rel="#L196">196</span>
<span id="L197" rel="#L197">197</span>
<span id="L198" rel="#L198">198</span>
<span id="L199" rel="#L199">199</span>
<span id="L200" rel="#L200">200</span>
<span id="L201" rel="#L201">201</span>
<span id="L202" rel="#L202">202</span>
<span id="L203" rel="#L203">203</span>
<span id="L204" rel="#L204">204</span>
<span id="L205" rel="#L205">205</span>
<span id="L206" rel="#L206">206</span>
<span id="L207" rel="#L207">207</span>
<span id="L208" rel="#L208">208</span>
<span id="L209" rel="#L209">209</span>
<span id="L210" rel="#L210">210</span>
<span id="L211" rel="#L211">211</span>
<span id="L212" rel="#L212">212</span>
<span id="L213" rel="#L213">213</span>
<span id="L214" rel="#L214">214</span>
<span id="L215" rel="#L215">215</span>
<span id="L216" rel="#L216">216</span>
<span id="L217" rel="#L217">217</span>
<span id="L218" rel="#L218">218</span>
<span id="L219" rel="#L219">219</span>
<span id="L220" rel="#L220">220</span>
<span id="L221" rel="#L221">221</span>
<span id="L222" rel="#L222">222</span>
<span id="L223" rel="#L223">223</span>
<span id="L224" rel="#L224">224</span>
<span id="L225" rel="#L225">225</span>
<span id="L226" rel="#L226">226</span>
<span id="L227" rel="#L227">227</span>
<span id="L228" rel="#L228">228</span>
<span id="L229" rel="#L229">229</span>
<span id="L230" rel="#L230">230</span>
<span id="L231" rel="#L231">231</span>
<span id="L232" rel="#L232">232</span>
<span id="L233" rel="#L233">233</span>
<span id="L234" rel="#L234">234</span>
<span id="L235" rel="#L235">235</span>
<span id="L236" rel="#L236">236</span>
<span id="L237" rel="#L237">237</span>
<span id="L238" rel="#L238">238</span>
<span id="L239" rel="#L239">239</span>
<span id="L240" rel="#L240">240</span>
<span id="L241" rel="#L241">241</span>
<span id="L242" rel="#L242">242</span>
<span id="L243" rel="#L243">243</span>
<span id="L244" rel="#L244">244</span>
<span id="L245" rel="#L245">245</span>
<span id="L246" rel="#L246">246</span>
<span id="L247" rel="#L247">247</span>
<span id="L248" rel="#L248">248</span>
<span id="L249" rel="#L249">249</span>
<span id="L250" rel="#L250">250</span>
<span id="L251" rel="#L251">251</span>
<span id="L252" rel="#L252">252</span>
<span id="L253" rel="#L253">253</span>
<span id="L254" rel="#L254">254</span>
<span id="L255" rel="#L255">255</span>
<span id="L256" rel="#L256">256</span>
<span id="L257" rel="#L257">257</span>
<span id="L258" rel="#L258">258</span>
<span id="L259" rel="#L259">259</span>
<span id="L260" rel="#L260">260</span>
<span id="L261" rel="#L261">261</span>
<span id="L262" rel="#L262">262</span>
<span id="L263" rel="#L263">263</span>
<span id="L264" rel="#L264">264</span>
<span id="L265" rel="#L265">265</span>
<span id="L266" rel="#L266">266</span>
<span id="L267" rel="#L267">267</span>
<span id="L268" rel="#L268">268</span>
<span id="L269" rel="#L269">269</span>
<span id="L270" rel="#L270">270</span>
<span id="L271" rel="#L271">271</span>
<span id="L272" rel="#L272">272</span>
<span id="L273" rel="#L273">273</span>
<span id="L274" rel="#L274">274</span>
<span id="L275" rel="#L275">275</span>
<span id="L276" rel="#L276">276</span>
<span id="L277" rel="#L277">277</span>
<span id="L278" rel="#L278">278</span>
<span id="L279" rel="#L279">279</span>
<span id="L280" rel="#L280">280</span>
<span id="L281" rel="#L281">281</span>
<span id="L282" rel="#L282">282</span>
<span id="L283" rel="#L283">283</span>
<span id="L284" rel="#L284">284</span>
<span id="L285" rel="#L285">285</span>
<span id="L286" rel="#L286">286</span>
<span id="L287" rel="#L287">287</span>
<span id="L288" rel="#L288">288</span>
<span id="L289" rel="#L289">289</span>
<span id="L290" rel="#L290">290</span>
<span id="L291" rel="#L291">291</span>
<span id="L292" rel="#L292">292</span>
<span id="L293" rel="#L293">293</span>
<span id="L294" rel="#L294">294</span>
<span id="L295" rel="#L295">295</span>
<span id="L296" rel="#L296">296</span>
<span id="L297" rel="#L297">297</span>
<span id="L298" rel="#L298">298</span>
<span id="L299" rel="#L299">299</span>
<span id="L300" rel="#L300">300</span>
<span id="L301" rel="#L301">301</span>
<span id="L302" rel="#L302">302</span>
<span id="L303" rel="#L303">303</span>
<span id="L304" rel="#L304">304</span>
<span id="L305" rel="#L305">305</span>
<span id="L306" rel="#L306">306</span>
<span id="L307" rel="#L307">307</span>
<span id="L308" rel="#L308">308</span>
<span id="L309" rel="#L309">309</span>
<span id="L310" rel="#L310">310</span>
<span id="L311" rel="#L311">311</span>
<span id="L312" rel="#L312">312</span>
<span id="L313" rel="#L313">313</span>
<span id="L314" rel="#L314">314</span>
<span id="L315" rel="#L315">315</span>
<span id="L316" rel="#L316">316</span>
<span id="L317" rel="#L317">317</span>
<span id="L318" rel="#L318">318</span>
<span id="L319" rel="#L319">319</span>
<span id="L320" rel="#L320">320</span>
<span id="L321" rel="#L321">321</span>
<span id="L322" rel="#L322">322</span>
<span id="L323" rel="#L323">323</span>
<span id="L324" rel="#L324">324</span>
<span id="L325" rel="#L325">325</span>
<span id="L326" rel="#L326">326</span>
<span id="L327" rel="#L327">327</span>
<span id="L328" rel="#L328">328</span>
<span id="L329" rel="#L329">329</span>
<span id="L330" rel="#L330">330</span>
<span id="L331" rel="#L331">331</span>
<span id="L332" rel="#L332">332</span>
<span id="L333" rel="#L333">333</span>
<span id="L334" rel="#L334">334</span>
<span id="L335" rel="#L335">335</span>
<span id="L336" rel="#L336">336</span>
<span id="L337" rel="#L337">337</span>
<span id="L338" rel="#L338">338</span>
<span id="L339" rel="#L339">339</span>
<span id="L340" rel="#L340">340</span>
<span id="L341" rel="#L341">341</span>
<span id="L342" rel="#L342">342</span>
<span id="L343" rel="#L343">343</span>
<span id="L344" rel="#L344">344</span>
<span id="L345" rel="#L345">345</span>
<span id="L346" rel="#L346">346</span>
<span id="L347" rel="#L347">347</span>
<span id="L348" rel="#L348">348</span>
<span id="L349" rel="#L349">349</span>
<span id="L350" rel="#L350">350</span>
<span id="L351" rel="#L351">351</span>
<span id="L352" rel="#L352">352</span>
<span id="L353" rel="#L353">353</span>
<span id="L354" rel="#L354">354</span>
<span id="L355" rel="#L355">355</span>
<span id="L356" rel="#L356">356</span>
<span id="L357" rel="#L357">357</span>
<span id="L358" rel="#L358">358</span>
<span id="L359" rel="#L359">359</span>
<span id="L360" rel="#L360">360</span>
<span id="L361" rel="#L361">361</span>
<span id="L362" rel="#L362">362</span>
<span id="L363" rel="#L363">363</span>
<span id="L364" rel="#L364">364</span>
<span id="L365" rel="#L365">365</span>
<span id="L366" rel="#L366">366</span>
<span id="L367" rel="#L367">367</span>
<span id="L368" rel="#L368">368</span>
<span id="L369" rel="#L369">369</span>
<span id="L370" rel="#L370">370</span>
<span id="L371" rel="#L371">371</span>
<span id="L372" rel="#L372">372</span>
<span id="L373" rel="#L373">373</span>
<span id="L374" rel="#L374">374</span>
<span id="L375" rel="#L375">375</span>
<span id="L376" rel="#L376">376</span>
<span id="L377" rel="#L377">377</span>
<span id="L378" rel="#L378">378</span>
<span id="L379" rel="#L379">379</span>
<span id="L380" rel="#L380">380</span>
<span id="L381" rel="#L381">381</span>
<span id="L382" rel="#L382">382</span>
<span id="L383" rel="#L383">383</span>
<span id="L384" rel="#L384">384</span>
<span id="L385" rel="#L385">385</span>
<span id="L386" rel="#L386">386</span>
<span id="L387" rel="#L387">387</span>
<span id="L388" rel="#L388">388</span>
<span id="L389" rel="#L389">389</span>
<span id="L390" rel="#L390">390</span>
<span id="L391" rel="#L391">391</span>
<span id="L392" rel="#L392">392</span>
<span id="L393" rel="#L393">393</span>
<span id="L394" rel="#L394">394</span>
<span id="L395" rel="#L395">395</span>
<span id="L396" rel="#L396">396</span>
<span id="L397" rel="#L397">397</span>
<span id="L398" rel="#L398">398</span>
<span id="L399" rel="#L399">399</span>
<span id="L400" rel="#L400">400</span>
<span id="L401" rel="#L401">401</span>
<span id="L402" rel="#L402">402</span>
<span id="L403" rel="#L403">403</span>
<span id="L404" rel="#L404">404</span>
<span id="L405" rel="#L405">405</span>
<span id="L406" rel="#L406">406</span>
<span id="L407" rel="#L407">407</span>
<span id="L408" rel="#L408">408</span>
<span id="L409" rel="#L409">409</span>
<span id="L410" rel="#L410">410</span>
<span id="L411" rel="#L411">411</span>
<span id="L412" rel="#L412">412</span>
<span id="L413" rel="#L413">413</span>
<span id="L414" rel="#L414">414</span>
<span id="L415" rel="#L415">415</span>
<span id="L416" rel="#L416">416</span>
<span id="L417" rel="#L417">417</span>
<span id="L418" rel="#L418">418</span>
<span id="L419" rel="#L419">419</span>
<span id="L420" rel="#L420">420</span>
<span id="L421" rel="#L421">421</span>
<span id="L422" rel="#L422">422</span>
<span id="L423" rel="#L423">423</span>
<span id="L424" rel="#L424">424</span>
<span id="L425" rel="#L425">425</span>
<span id="L426" rel="#L426">426</span>
<span id="L427" rel="#L427">427</span>
<span id="L428" rel="#L428">428</span>
<span id="L429" rel="#L429">429</span>
<span id="L430" rel="#L430">430</span>
<span id="L431" rel="#L431">431</span>
<span id="L432" rel="#L432">432</span>
<span id="L433" rel="#L433">433</span>
<span id="L434" rel="#L434">434</span>
<span id="L435" rel="#L435">435</span>
<span id="L436" rel="#L436">436</span>
<span id="L437" rel="#L437">437</span>
<span id="L438" rel="#L438">438</span>
<span id="L439" rel="#L439">439</span>
<span id="L440" rel="#L440">440</span>
<span id="L441" rel="#L441">441</span>
<span id="L442" rel="#L442">442</span>
<span id="L443" rel="#L443">443</span>
<span id="L444" rel="#L444">444</span>
<span id="L445" rel="#L445">445</span>

            </td>
            <td class="blob-line-code"><div class="code-body highlight"><pre><div class='line' id='LC1'><span class="o">&lt;?</span><span class="nx">php</span> <span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nb">defined</span><span class="p">(</span><span class="s2">&quot;BASEPATH&quot;</span><span class="p">)){</span> <span class="k">exit</span><span class="p">(</span><span class="s2">&quot;No direct script access allowed&quot;</span><span class="p">);</span> <span class="p">}</span></div><div class='line' id='LC2'><br/></div><div class='line' id='LC3'>	<span class="sd">/**</span></div><div class='line' id='LC4'><span class="sd">	 * Multi-Upload</span></div><div class='line' id='LC5'><span class="sd">	 * </span></div><div class='line' id='LC6'><span class="sd">	 * Extends CodeIgniters native Upload class to add support for multiple</span></div><div class='line' id='LC7'><span class="sd">	 * uploads.</span></div><div class='line' id='LC8'><span class="sd">	 *</span></div><div class='line' id='LC9'><span class="sd">	 * @package		CodeIgniter</span></div><div class='line' id='LC10'><span class="sd">	 * @subpackage	Libraries</span></div><div class='line' id='LC11'><span class="sd">	 * @category	Uploads</span></div><div class='line' id='LC12'><span class="sd">	 * @author		Conveyor Group &lt;steven@conveyorgroup.com&gt;</span></div><div class='line' id='LC13'><span class="sd">	 * @link		https://github.com/stvnthomas/CodeIgniter-2.1-Multi-Upload</span></div><div class='line' id='LC14'><span class="sd">	 */</span></div><div class='line' id='LC15'>		<span class="k">class</span> <span class="nc">MY_Upload</span> <span class="k">extends</span> <span class="nx">CI_Upload</span> <span class="p">{</span></div><div class='line' id='LC16'><br/></div><div class='line' id='LC17'><br/></div><div class='line' id='LC18'>			<span class="sd">/**</span></div><div class='line' id='LC19'><span class="sd">			 * Properties</span></div><div class='line' id='LC20'><span class="sd">			 */</span></div><div class='line' id='LC21'>			 	<span class="k">protected</span> <span class="nv">$_multi_upload_data</span>			<span class="o">=</span> <span class="k">array</span><span class="p">();</span></div><div class='line' id='LC22'>				<span class="k">protected</span> <span class="nv">$_multi_file_name_override</span>	<span class="o">=</span> <span class="s2">&quot;&quot;</span><span class="p">;</span></div><div class='line' id='LC23'><br/></div><div class='line' id='LC24'><br/></div><div class='line' id='LC25'>			<span class="sd">/**</span></div><div class='line' id='LC26'><span class="sd">			 * Initialize preferences</span></div><div class='line' id='LC27'><span class="sd">			 *</span></div><div class='line' id='LC28'><span class="sd">			 * @access	public</span></div><div class='line' id='LC29'><span class="sd">			 * @param	array</span></div><div class='line' id='LC30'><span class="sd">			 * @return	void</span></div><div class='line' id='LC31'><span class="sd">			 */</span></div><div class='line' id='LC32'>				<span class="k">public</span> <span class="k">function</span> <span class="nf">initialize</span><span class="p">(</span><span class="nv">$config</span> <span class="o">=</span> <span class="k">array</span><span class="p">()){</span></div><div class='line' id='LC33'>					<span class="c1">//Upload default settings.</span></div><div class='line' id='LC34'>					<span class="nv">$defaults</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC35'>									<span class="s2">&quot;max_size&quot;</span>			<span class="o">=&gt;</span> <span class="mi">0</span><span class="p">,</span></div><div class='line' id='LC36'>									<span class="s2">&quot;max_width&quot;</span>			<span class="o">=&gt;</span> <span class="mi">0</span><span class="p">,</span></div><div class='line' id='LC37'>									<span class="s2">&quot;max_height&quot;</span>		<span class="o">=&gt;</span> <span class="mi">0</span><span class="p">,</span></div><div class='line' id='LC38'>									<span class="s2">&quot;max_filename&quot;</span>		<span class="o">=&gt;</span> <span class="mi">0</span><span class="p">,</span></div><div class='line' id='LC39'>									<span class="s2">&quot;allowed_types&quot;</span>		<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC40'>									<span class="s2">&quot;file_temp&quot;</span>			<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC41'>									<span class="s2">&quot;file_name&quot;</span>			<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC42'>									<span class="s2">&quot;orig_name&quot;</span>			<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC43'>									<span class="s2">&quot;file_type&quot;</span>			<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC44'>									<span class="s2">&quot;file_size&quot;</span>			<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC45'>									<span class="s2">&quot;file_ext&quot;</span>			<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC46'>									<span class="s2">&quot;upload_path&quot;</span>		<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC47'>									<span class="s2">&quot;overwrite&quot;</span>			<span class="o">=&gt;</span> <span class="k">FALSE</span><span class="p">,</span></div><div class='line' id='LC48'>									<span class="s2">&quot;encrypt_name&quot;</span>		<span class="o">=&gt;</span> <span class="k">FALSE</span><span class="p">,</span></div><div class='line' id='LC49'>									<span class="s2">&quot;is_image&quot;</span>			<span class="o">=&gt;</span> <span class="k">FALSE</span><span class="p">,</span></div><div class='line' id='LC50'>									<span class="s2">&quot;image_width&quot;</span>		<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC51'>									<span class="s2">&quot;image_height&quot;</span>		<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC52'>									<span class="s2">&quot;image_type&quot;</span>		<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC53'>									<span class="s2">&quot;image_size_str&quot;</span>	<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span><span class="p">,</span></div><div class='line' id='LC54'>									<span class="s2">&quot;error_msg&quot;</span>			<span class="o">=&gt;</span> <span class="k">array</span><span class="p">(),</span></div><div class='line' id='LC55'>									<span class="s2">&quot;mimes&quot;</span>				<span class="o">=&gt;</span> <span class="k">array</span><span class="p">(),</span></div><div class='line' id='LC56'>									<span class="s2">&quot;remove_spaces&quot;</span>		<span class="o">=&gt;</span> <span class="k">TRUE</span><span class="p">,</span></div><div class='line' id='LC57'>									<span class="s2">&quot;xss_clean&quot;</span>			<span class="o">=&gt;</span> <span class="k">FALSE</span><span class="p">,</span></div><div class='line' id='LC58'>									<span class="s2">&quot;temp_prefix&quot;</span>		<span class="o">=&gt;</span> <span class="s2">&quot;temp_file_&quot;</span><span class="p">,</span></div><div class='line' id='LC59'>									<span class="s2">&quot;client_name&quot;</span>		<span class="o">=&gt;</span> <span class="s2">&quot;&quot;</span></div><div class='line' id='LC60'>								<span class="p">);</span></div><div class='line' id='LC61'><br/></div><div class='line' id='LC62'>					<span class="c1">//Set each configuration.</span></div><div class='line' id='LC63'>					<span class="k">foreach</span><span class="p">(</span><span class="nv">$defaults</span> <span class="k">as</span> <span class="nv">$key</span> <span class="o">=&gt;</span> <span class="nv">$val</span><span class="p">){</span></div><div class='line' id='LC64'>						<span class="k">if</span><span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$config</span><span class="p">[</span><span class="nv">$key</span><span class="p">])){</span></div><div class='line' id='LC65'>							<span class="nv">$method</span> <span class="o">=</span> <span class="s2">&quot;set_</span><span class="si">{</span><span class="nv">$key</span><span class="si">}</span><span class="s2">&quot;</span><span class="p">;</span></div><div class='line' id='LC66'>							<span class="k">if</span><span class="p">(</span><span class="nb">method_exists</span><span class="p">(</span><span class="nv">$this</span><span class="p">,</span> <span class="nv">$method</span><span class="p">)){</span></div><div class='line' id='LC67'>								<span class="nv">$this</span><span class="o">-&gt;</span><span class="nv">$method</span><span class="p">(</span><span class="nv">$config</span><span class="p">[</span><span class="nv">$key</span><span class="p">]);</span></div><div class='line' id='LC68'>							<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC69'>								<span class="nv">$this</span><span class="o">-&gt;</span><span class="nv">$key</span> <span class="o">=</span> <span class="nv">$config</span><span class="p">[</span><span class="nv">$key</span><span class="p">];</span></div><div class='line' id='LC70'>							<span class="p">}</span></div><div class='line' id='LC71'>						<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC72'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="nv">$key</span> <span class="o">=</span> <span class="nv">$val</span><span class="p">;</span></div><div class='line' id='LC73'>						<span class="p">}</span></div><div class='line' id='LC74'>					<span class="p">}</span></div><div class='line' id='LC75'><br/></div><div class='line' id='LC76'>					<span class="c1">//Check if file_name was provided.</span></div><div class='line' id='LC77'>					<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">)){</span></div><div class='line' id='LC78'>						<span class="c1">//Multiple file upload.</span></div><div class='line' id='LC79'>						<span class="k">if</span><span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">)){</span></div><div class='line' id='LC80'>							<span class="c1">//Clear file name override.</span></div><div class='line' id='LC81'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_file_name_override</span> <span class="o">=</span> <span class="s2">&quot;&quot;</span><span class="p">;</span></div><div class='line' id='LC82'><br/></div><div class='line' id='LC83'>							<span class="c1">//Set multiple file name override.</span></div><div class='line' id='LC84'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_multi_file_name_override</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">;</span></div><div class='line' id='LC85'>						<span class="c1">//Single file upload.</span></div><div class='line' id='LC86'>						<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC87'>							<span class="c1">//Set file name override.</span></div><div class='line' id='LC88'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_file_name_override</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">;</span></div><div class='line' id='LC89'><br/></div><div class='line' id='LC90'>							<span class="c1">//Clear multiple file name override.</span></div><div class='line' id='LC91'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_multi_file_name_override</span> <span class="o">=</span> <span class="s2">&quot;&quot;</span><span class="p">;</span></div><div class='line' id='LC92'>						<span class="p">}</span></div><div class='line' id='LC93'>					<span class="p">}</span></div><div class='line' id='LC94'>				<span class="p">}</span></div><div class='line' id='LC95'><br/></div><div class='line' id='LC96'><br/></div><div class='line' id='LC97'>			<span class="sd">/**</span></div><div class='line' id='LC98'><span class="sd">			 * File MIME Type</span></div><div class='line' id='LC99'><span class="sd">			 * </span></div><div class='line' id='LC100'><span class="sd">			 * Detects the (actual) MIME type of the uploaded file, if possible.</span></div><div class='line' id='LC101'><span class="sd">			 * The input array is expected to be $_FILES[$field].</span></div><div class='line' id='LC102'><span class="sd">			 * </span></div><div class='line' id='LC103'><span class="sd">			 * In the case of multiple uploads, a optional second argument may be</span></div><div class='line' id='LC104'><span class="sd">			 * passed specifying which array element of the $_FILES[$field] array</span></div><div class='line' id='LC105'><span class="sd">			 * elements should be referenced (name, type, tmp_name, etc).</span></div><div class='line' id='LC106'><span class="sd">			 *</span></div><div class='line' id='LC107'><span class="sd">			 * @access	protected</span></div><div class='line' id='LC108'><span class="sd">			 * @param	$file	array</span></div><div class='line' id='LC109'><span class="sd">			 * @param	$count	int</span></div><div class='line' id='LC110'><span class="sd">			 * @return	void</span></div><div class='line' id='LC111'><span class="sd">			 */</span></div><div class='line' id='LC112'>				<span class="k">protected</span> <span class="k">function</span> <span class="nf">_file_mime_type</span><span class="p">(</span><span class="nv">$file</span><span class="p">,</span> <span class="nv">$count</span><span class="o">=</span><span class="mi">0</span><span class="p">){</span></div><div class='line' id='LC113'>					<span class="c1">//Mutliple file?</span></div><div class='line' id='LC114'>					<span class="k">if</span><span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$file</span><span class="p">[</span><span class="s2">&quot;name&quot;</span><span class="p">])){</span></div><div class='line' id='LC115'>						<span class="nv">$tmp_name</span> <span class="o">=</span> <span class="nv">$file</span><span class="p">[</span><span class="s2">&quot;tmp_name&quot;</span><span class="p">][</span><span class="nv">$count</span><span class="p">];</span></div><div class='line' id='LC116'>						<span class="nv">$type</span> <span class="o">=</span> <span class="nv">$file</span><span class="p">[</span><span class="s2">&quot;type&quot;</span><span class="p">][</span><span class="nv">$count</span><span class="p">];</span></div><div class='line' id='LC117'>					<span class="c1">//Single file.</span></div><div class='line' id='LC118'>					<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC119'>						<span class="nv">$tmp_name</span> <span class="o">=</span> <span class="nv">$file</span><span class="p">[</span><span class="s2">&quot;tmp_name&quot;</span><span class="p">];</span></div><div class='line' id='LC120'>						<span class="nv">$type</span> <span class="o">=</span> <span class="nv">$file</span><span class="p">[</span><span class="s2">&quot;type&quot;</span><span class="p">];</span></div><div class='line' id='LC121'>					<span class="p">}</span></div><div class='line' id='LC122'><br/></div><div class='line' id='LC123'>					<span class="c1">//We&#39;ll need this to validate the MIME info string (e.g. text/plain; charset=us-ascii).</span></div><div class='line' id='LC124'>					<span class="nv">$regexp</span> <span class="o">=</span> <span class="s2">&quot;/^([a-z\-]+\/[a-z0-9\-\.\+]+)(;\s.+)?$/&quot;</span><span class="p">;</span></div><div class='line' id='LC125'><br/></div><div class='line' id='LC126'>					<span class="cm">/* Fileinfo Extension - most reliable method.</span></div><div class='line' id='LC127'><span class="cm">					 * </span></div><div class='line' id='LC128'><span class="cm">					 * Unfortunately, prior to PHP 5.3 - it&#39;s only available as a PECL extension and the</span></div><div class='line' id='LC129'><span class="cm">					 * more convenient FILEINFO_MIME_TYPE flag doesn&#39;t exist.</span></div><div class='line' id='LC130'><span class="cm">					 */</span></div><div class='line' id='LC131'>					 	<span class="k">if</span><span class="p">(</span><span class="nb">function_exists</span><span class="p">(</span><span class="s2">&quot;finfo_file&quot;</span><span class="p">)){</span></div><div class='line' id='LC132'>					 		<span class="nv">$finfo</span> <span class="o">=</span> <span class="nb">finfo_open</span><span class="p">(</span><span class="nx">FILEINFO_MIME</span><span class="p">);</span></div><div class='line' id='LC133'>							<span class="k">if</span><span class="p">(</span><span class="nb">is_resource</span><span class="p">(</span><span class="nv">$finfo</span><span class="p">)){</span></div><div class='line' id='LC134'>								<span class="nv">$mime</span> <span class="o">=</span> <span class="o">@</span><span class="nb">finfo_file</span><span class="p">(</span><span class="nv">$finfo</span><span class="p">,</span> <span class="nv">$tmp_name</span><span class="p">);</span></div><div class='line' id='LC135'>								<span class="nb">finfo_close</span><span class="p">(</span><span class="nv">$finfo</span><span class="p">);</span></div><div class='line' id='LC136'><br/></div><div class='line' id='LC137'>								<span class="cm">/* According to the comments section of the PHP manual page,</span></div><div class='line' id='LC138'><span class="cm">								 * it is possible that this function returns an empty string</span></div><div class='line' id='LC139'><span class="cm">								 * for some files (e.g. if they don&#39;t exist in the magic MIME database).</span></div><div class='line' id='LC140'><span class="cm">								 */</span></div><div class='line' id='LC141'>								 	<span class="k">if</span><span class="p">(</span><span class="nb">is_string</span><span class="p">(</span><span class="nv">$mime</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="nb">preg_match</span><span class="p">(</span><span class="nv">$regexp</span><span class="p">,</span> <span class="nv">$mime</span><span class="p">,</span> <span class="nv">$matches</span><span class="p">)){</span></div><div class='line' id='LC142'>								 		<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span> <span class="o">=</span> <span class="nv">$matches</span><span class="p">[</span><span class="mi">1</span><span class="p">];</span></div><div class='line' id='LC143'>										<span class="k">return</span><span class="p">;</span></div><div class='line' id='LC144'>								 	<span class="p">}</span></div><div class='line' id='LC145'>							<span class="p">}</span></div><div class='line' id='LC146'>					 	<span class="p">}</span></div><div class='line' id='LC147'><br/></div><div class='line' id='LC148'>					<span class="cm">/* This is an ugly hack, but UNIX-type systems provide a &quot;native&quot; way to detect the file type,</span></div><div class='line' id='LC149'><span class="cm">					 * which is still more secure than depending on the value of $_FILES[$field][&#39;type&#39;], and as it</span></div><div class='line' id='LC150'><span class="cm">					 * was reported in issue #750 (https://github.com/EllisLab/CodeIgniter/issues/750) - it&#39;s better</span></div><div class='line' id='LC151'><span class="cm">					 * than mime_content_type() as well, hence the attempts to try calling the command line with</span></div><div class='line' id='LC152'><span class="cm">					 * three different functions.</span></div><div class='line' id='LC153'><span class="cm">					 *</span></div><div class='line' id='LC154'><span class="cm">					 * Notes:</span></div><div class='line' id='LC155'><span class="cm">					 *	- the DIRECTORY_SEPARATOR comparison ensures that we&#39;re not on a Windows system</span></div><div class='line' id='LC156'><span class="cm">					 *	- many system admins would disable the exec(), shell_exec(), popen() and similar functions</span></div><div class='line' id='LC157'><span class="cm">					 *	  due to security concerns, hence the function_exists() checks</span></div><div class='line' id='LC158'><span class="cm">					 */</span></div><div class='line' id='LC159'>					 	<span class="k">if</span><span class="p">(</span><span class="nx">DIRECTORY_SEPARATOR</span> <span class="o">!==</span> <span class="s2">&quot;</span><span class="se">\\</span><span class="s2">&quot;</span><span class="p">){</span></div><div class='line' id='LC160'>					 		<span class="nv">$cmd</span> <span class="o">=</span> <span class="s2">&quot;file --brief --mime &quot;</span><span class="o">.</span><span class="nb">escapeshellarg</span><span class="p">(</span><span class="nv">$tmp_name</span><span class="p">)</span><span class="o">.</span><span class="s2">&quot; 2&gt;&amp;1&quot;</span><span class="p">;</span></div><div class='line' id='LC161'><br/></div><div class='line' id='LC162'>							<span class="k">if</span><span class="p">(</span><span class="nb">function_exists</span><span class="p">(</span><span class="s2">&quot;exec&quot;</span><span class="p">)){</span></div><div class='line' id='LC163'>								<span class="cm">/* This might look confusing, as $mime is being populated with all of the output when set in the second parameter.</span></div><div class='line' id='LC164'><span class="cm">								 * However, we only neeed the last line, which is the actual return value of exec(), and as such - it overwrites</span></div><div class='line' id='LC165'><span class="cm">								 * anything that could already be set for $mime previously. This effectively makes the second parameter a dummy</span></div><div class='line' id='LC166'><span class="cm">								 * value, which is only put to allow us to get the return status code.</span></div><div class='line' id='LC167'><span class="cm">								 */</span></div><div class='line' id='LC168'>									<span class="nv">$mime</span> <span class="o">=</span> <span class="o">@</span><span class="nb">exec</span><span class="p">(</span><span class="nv">$cmd</span><span class="p">,</span> <span class="nv">$mime</span><span class="p">,</span> <span class="nv">$return_status</span><span class="p">);</span></div><div class='line' id='LC169'>									<span class="k">if</span><span class="p">(</span><span class="nv">$return_status</span> <span class="o">===</span> <span class="mi">0</span> <span class="o">&amp;&amp;</span> <span class="nb">is_string</span><span class="p">(</span><span class="nv">$mime</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="nb">preg_match</span><span class="p">(</span><span class="nv">$regexp</span><span class="p">,</span> <span class="nv">$mime</span><span class="p">,</span> <span class="nv">$matches</span><span class="p">)){</span></div><div class='line' id='LC170'>										<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span> <span class="o">=</span> <span class="nv">$matches</span><span class="p">[</span><span class="mi">1</span><span class="p">];</span></div><div class='line' id='LC171'>										<span class="k">return</span><span class="p">;</span></div><div class='line' id='LC172'>									<span class="p">}</span></div><div class='line' id='LC173'>							<span class="p">}</span></div><div class='line' id='LC174'>					 	<span class="p">}</span></div><div class='line' id='LC175'><br/></div><div class='line' id='LC176'>						<span class="k">if</span><span class="p">((</span><span class="nx">bool</span><span class="p">)</span><span class="o">@</span><span class="nb">ini_get</span><span class="p">(</span><span class="s2">&quot;safe_mode&quot;</span><span class="p">)</span> <span class="o">===</span> <span class="k">FALSE</span> <span class="o">&amp;&amp;</span> <span class="nb">function_exists</span><span class="p">(</span><span class="s2">&quot;shell_exec&quot;</span><span class="p">)){</span></div><div class='line' id='LC177'>							<span class="nv">$mime</span> <span class="o">=</span> <span class="o">@</span><span class="nb">shell_exec</span><span class="p">(</span><span class="nv">$cmd</span><span class="p">);</span></div><div class='line' id='LC178'>							<span class="k">if</span><span class="p">(</span><span class="nb">strlen</span><span class="p">(</span><span class="nv">$mime</span><span class="p">)</span> <span class="o">&gt;</span> <span class="mi">0</span><span class="p">){</span></div><div class='line' id='LC179'>								<span class="nv">$mime</span> <span class="o">=</span> <span class="nb">explode</span><span class="p">(</span><span class="s2">&quot;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">,</span> <span class="nx">trim</span><span class="p">(</span><span class="nv">$mime</span><span class="p">));</span></div><div class='line' id='LC180'>								<span class="k">if</span><span class="p">(</span><span class="nb">preg_match</span><span class="p">(</span><span class="nv">$regexp</span><span class="p">,</span> <span class="nv">$mime</span><span class="p">[(</span><span class="nb">count</span><span class="p">(</span><span class="nv">$mime</span><span class="p">)</span> <span class="o">-</span> <span class="mi">1</span><span class="p">)],</span> <span class="nv">$matches</span><span class="p">)){</span></div><div class='line' id='LC181'>									<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span> <span class="o">=</span> <span class="nv">$matches</span><span class="p">[</span><span class="mi">1</span><span class="p">];</span></div><div class='line' id='LC182'>									<span class="k">return</span><span class="p">;</span></div><div class='line' id='LC183'>								<span class="p">}</span></div><div class='line' id='LC184'>							<span class="p">}</span></div><div class='line' id='LC185'>						<span class="p">}</span></div><div class='line' id='LC186'><br/></div><div class='line' id='LC187'>						<span class="k">if</span><span class="p">(</span><span class="nb">function_exists</span><span class="p">(</span><span class="s2">&quot;popen&quot;</span><span class="p">)){</span></div><div class='line' id='LC188'>							<span class="nv">$proc</span> <span class="o">=</span> <span class="o">@</span><span class="nb">popen</span><span class="p">(</span><span class="nv">$cmd</span><span class="p">,</span> <span class="s2">&quot;r&quot;</span><span class="p">);</span></div><div class='line' id='LC189'>							<span class="k">if</span><span class="p">(</span><span class="nb">is_resource</span><span class="p">(</span><span class="nv">$proc</span><span class="p">)){</span></div><div class='line' id='LC190'>								<span class="nv">$mime</span> <span class="o">=</span> <span class="o">@</span><span class="nb">fread</span><span class="p">(</span><span class="nv">$proc</span><span class="p">,</span> <span class="mi">512</span><span class="p">);</span></div><div class='line' id='LC191'>								<span class="o">@</span><span class="nb">pclose</span><span class="p">(</span><span class="nv">$proc</span><span class="p">);</span></div><div class='line' id='LC192'>								<span class="k">if</span><span class="p">(</span><span class="nv">$mime</span> <span class="o">!==</span> <span class="k">FALSE</span><span class="p">){</span></div><div class='line' id='LC193'>									<span class="nv">$mime</span> <span class="o">=</span> <span class="nb">explode</span><span class="p">(</span><span class="s2">&quot;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">,</span> <span class="nx">trim</span><span class="p">(</span><span class="nv">$mime</span><span class="p">));</span></div><div class='line' id='LC194'>									<span class="k">if</span><span class="p">(</span><span class="nb">preg_match</span><span class="p">(</span><span class="nv">$regexp</span><span class="p">,</span> <span class="nv">$mime</span><span class="p">[(</span><span class="nb">count</span><span class="p">(</span><span class="nv">$mime</span><span class="p">)</span> <span class="o">-</span> <span class="mi">1</span><span class="p">)],</span> <span class="nv">$matches</span><span class="p">)){</span></div><div class='line' id='LC195'>										<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span> <span class="o">=</span> <span class="nv">$matches</span><span class="p">[</span><span class="mi">1</span><span class="p">];</span></div><div class='line' id='LC196'>										<span class="k">return</span><span class="p">;</span></div><div class='line' id='LC197'>									<span class="p">}</span></div><div class='line' id='LC198'>								<span class="p">}</span></div><div class='line' id='LC199'>							<span class="p">}</span></div><div class='line' id='LC200'>						<span class="p">}</span></div><div class='line' id='LC201'><br/></div><div class='line' id='LC202'>						<span class="c1">//Fall back to the deprecated mime_content_type(), if available (still better than $_FILES[$field][&quot;type&quot;])</span></div><div class='line' id='LC203'>						<span class="k">if</span><span class="p">(</span><span class="nb">function_exists</span><span class="p">(</span><span class="s2">&quot;mime_content_type&quot;</span><span class="p">)){</span></div><div class='line' id='LC204'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span> <span class="o">=</span> <span class="o">@</span><span class="nb">mime_content_type</span><span class="p">(</span><span class="nv">$tmp_name</span><span class="p">);</span></div><div class='line' id='LC205'>							<span class="c1">//It&#39;s possible that mime_content_type() returns FALSE or an empty string.</span></div><div class='line' id='LC206'>							<span class="k">if</span><span class="p">(</span><span class="nb">strlen</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span><span class="p">)</span> <span class="o">&gt;</span> <span class="mi">0</span><span class="p">){</span></div><div class='line' id='LC207'>								<span class="k">return</span><span class="p">;</span></div><div class='line' id='LC208'>							<span class="p">}</span></div><div class='line' id='LC209'>						<span class="p">}</span></div><div class='line' id='LC210'><br/></div><div class='line' id='LC211'>						<span class="c1">//If all else fails, use $_FILES default mime type.</span></div><div class='line' id='LC212'>						<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span> <span class="o">=</span> <span class="nv">$type</span><span class="p">;</span></div><div class='line' id='LC213'>				<span class="p">}</span></div><div class='line' id='LC214'><br/></div><div class='line' id='LC215'><br/></div><div class='line' id='LC216'>			<span class="sd">/**</span></div><div class='line' id='LC217'><span class="sd">			 * Set Multiple Upload Data</span></div><div class='line' id='LC218'><span class="sd">			 *</span></div><div class='line' id='LC219'><span class="sd">			 * @access	protected</span></div><div class='line' id='LC220'><span class="sd">			 * @return	void</span></div><div class='line' id='LC221'><span class="sd">			 */</span></div><div class='line' id='LC222'>				<span class="k">protected</span> <span class="k">function</span> <span class="nf">set_multi_upload_data</span><span class="p">(){</span></div><div class='line' id='LC223'>					<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_multi_upload_data</span><span class="p">[]</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC224'>						<span class="s2">&quot;file_name&quot;</span>			<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">,</span></div><div class='line' id='LC225'>						<span class="s2">&quot;file_type&quot;</span>			<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span><span class="p">,</span></div><div class='line' id='LC226'>						<span class="s2">&quot;file_path&quot;</span>			<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">upload_path</span><span class="p">,</span></div><div class='line' id='LC227'>						<span class="s2">&quot;full_path&quot;</span>			<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">upload_path</span><span class="o">.</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">,</span></div><div class='line' id='LC228'>						<span class="s2">&quot;raw_name&quot;</span>			<span class="o">=&gt;</span> <span class="nb">str_replace</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_ext</span><span class="p">,</span> <span class="s2">&quot;&quot;</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">),</span></div><div class='line' id='LC229'>						<span class="s2">&quot;orig_name&quot;</span>			<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">orig_name</span><span class="p">,</span></div><div class='line' id='LC230'>						<span class="s2">&quot;client_name&quot;</span>		<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">client_name</span><span class="p">,</span></div><div class='line' id='LC231'>						<span class="s2">&quot;file_ext&quot;</span>			<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_ext</span><span class="p">,</span></div><div class='line' id='LC232'>						<span class="s2">&quot;file_size&quot;</span>			<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_size</span><span class="p">,</span></div><div class='line' id='LC233'>						<span class="s2">&quot;is_image&quot;</span>			<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">is_image</span><span class="p">(),</span></div><div class='line' id='LC234'>						<span class="s2">&quot;image_width&quot;</span>		<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">image_width</span><span class="p">,</span></div><div class='line' id='LC235'>						<span class="s2">&quot;image_height&quot;</span>		<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">image_height</span><span class="p">,</span></div><div class='line' id='LC236'>						<span class="s2">&quot;image_type&quot;</span>		<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">image_type</span><span class="p">,</span></div><div class='line' id='LC237'>						<span class="s2">&quot;image_size_str&quot;</span>	<span class="o">=&gt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">image_size_str</span></div><div class='line' id='LC238'>					<span class="p">);</span></div><div class='line' id='LC239'>				<span class="p">}</span></div><div class='line' id='LC240'><br/></div><div class='line' id='LC241'><br/></div><div class='line' id='LC242'>			<span class="sd">/**</span></div><div class='line' id='LC243'><span class="sd">			 * Get Multiple Upload Data</span></div><div class='line' id='LC244'><span class="sd">			 *</span></div><div class='line' id='LC245'><span class="sd">			 * @access	public</span></div><div class='line' id='LC246'><span class="sd">			 * @return	array</span></div><div class='line' id='LC247'><span class="sd">			 */</span></div><div class='line' id='LC248'>				<span class="k">public</span> <span class="k">function</span> <span class="nf">get_multi_upload_data</span><span class="p">(){</span></div><div class='line' id='LC249'>					<span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_multi_upload_data</span><span class="p">;</span></div><div class='line' id='LC250'>				<span class="p">}</span></div><div class='line' id='LC251'><br/></div><div class='line' id='LC252'><br/></div><div class='line' id='LC253'>			<span class="sd">/**</span></div><div class='line' id='LC254'><span class="sd">			 * Multile File Upload</span></div><div class='line' id='LC255'><span class="sd">			 *</span></div><div class='line' id='LC256'><span class="sd">			 * @access	public</span></div><div class='line' id='LC257'><span class="sd">			 * @param	string</span></div><div class='line' id='LC258'><span class="sd">			 * @return	mixed</span></div><div class='line' id='LC259'><span class="sd">			 */</span></div><div class='line' id='LC260'>				<span class="k">public</span> <span class="k">function</span> <span class="nf">do_multi_upload</span><span class="p">(</span><span class="nv">$field</span><span class="p">){</span></div><div class='line' id='LC261'>					<span class="c1">//Clear multi_upload_data.</span></div><div class='line' id='LC262'>					<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_multi_upload_data</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span></div><div class='line' id='LC263'><br/></div><div class='line' id='LC264'>					<span class="c1">//Is $_FILES[$field] set? If not, no reason to continue.</span></div><div class='line' id='LC265'>					<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$_FILES</span><span class="p">[</span><span class="nv">$field</span><span class="p">])){</span> <span class="k">return</span> <span class="k">false</span><span class="p">;</span> <span class="p">}</span></div><div class='line' id='LC266'><br/></div><div class='line' id='LC267'>					<span class="c1">//Is this really a multi upload?</span></div><div class='line' id='LC268'>					<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$_FILES</span><span class="p">[</span><span class="nv">$field</span><span class="p">][</span><span class="s2">&quot;name&quot;</span><span class="p">])){</span></div><div class='line' id='LC269'>						<span class="c1">//Fallback to do_upload method.</span></div><div class='line' id='LC270'>						<span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">do_upload</span><span class="p">(</span><span class="nv">$field</span><span class="p">);</span></div><div class='line' id='LC271'>					<span class="p">}</span></div><div class='line' id='LC272'><br/></div><div class='line' id='LC273'>					<span class="c1">//Is the upload path valid?</span></div><div class='line' id='LC274'>					<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">validate_upload_path</span><span class="p">()){</span></div><div class='line' id='LC275'>						<span class="c1">//Errors will already be set by validate_upload_path() so just return FALSE</span></div><div class='line' id='LC276'>						<span class="k">return</span> <span class="k">FALSE</span><span class="p">;</span></div><div class='line' id='LC277'>					<span class="p">}</span></div><div class='line' id='LC278'><br/></div><div class='line' id='LC279'>					<span class="c1">//Every file will have a separate entry in each of the $_FILES associative array elements (name, type, etc).</span></div><div class='line' id='LC280'>					<span class="c1">//Loop through $_FILES[$field][&quot;name&quot;] as representative of total number of files. Use count as key in</span></div><div class='line' id='LC281'>					<span class="c1">//corresponding elements of the $_FILES[$field] elements.</span></div><div class='line' id='LC282'>					<span class="k">for</span><span class="p">(</span><span class="nv">$i</span><span class="o">=</span><span class="mi">0</span><span class="p">;</span> <span class="nv">$i</span><span class="o">&lt;</span><span class="nb">count</span><span class="p">(</span><span class="nv">$_FILES</span><span class="p">[</span><span class="nv">$field</span><span class="p">][</span><span class="s2">&quot;name&quot;</span><span class="p">]);</span> <span class="nv">$i</span><span class="o">++</span><span class="p">){</span></div><div class='line' id='LC283'>						<span class="c1">//Was the file able to be uploaded? If not, determine the reason why.</span></div><div class='line' id='LC284'>						<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nb">is_uploaded_file</span><span class="p">(</span><span class="nv">$_FILES</span><span class="p">[</span><span class="nv">$field</span><span class="p">][</span><span class="s2">&quot;tmp_name&quot;</span><span class="p">][</span><span class="nv">$i</span><span class="p">])){</span></div><div class='line' id='LC285'>							<span class="c1">//Determine error number.</span></div><div class='line' id='LC286'>							<span class="nv">$error</span> <span class="o">=</span> <span class="p">(</span><span class="o">!</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$_FILES</span><span class="p">[</span><span class="nv">$field</span><span class="p">][</span><span class="s2">&quot;error&quot;</span><span class="p">][</span><span class="nv">$i</span><span class="p">]))</span> <span class="o">?</span> <span class="mi">4</span> <span class="o">:</span> <span class="nv">$_FILES</span><span class="p">[</span><span class="nv">$field</span><span class="p">][</span><span class="s2">&quot;error&quot;</span><span class="p">][</span><span class="nv">$i</span><span class="p">];</span></div><div class='line' id='LC287'><br/></div><div class='line' id='LC288'>							<span class="c1">//Set error.</span></div><div class='line' id='LC289'>							<span class="k">switch</span><span class="p">(</span><span class="nv">$error</span><span class="p">){</span></div><div class='line' id='LC290'>								<span class="c1">//UPLOAD_ERR_INI_SIZE</span></div><div class='line' id='LC291'>								<span class="k">case</span> <span class="mi">1</span><span class="o">:</span></div><div class='line' id='LC292'>									<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_file_exceeds_limit&quot;</span><span class="p">);</span></div><div class='line' id='LC293'>								<span class="k">break</span><span class="p">;</span></div><div class='line' id='LC294'>								<span class="c1">//UPLOAD_ERR_FORM_SIZE</span></div><div class='line' id='LC295'>								<span class="k">case</span> <span class="mi">2</span><span class="o">:</span></div><div class='line' id='LC296'>									<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_file_exceeds_form_limit&quot;</span><span class="p">);</span></div><div class='line' id='LC297'>								<span class="k">break</span><span class="p">;</span></div><div class='line' id='LC298'>								<span class="c1">//UPLOAD_ERR_PARTIAL</span></div><div class='line' id='LC299'>								<span class="k">case</span> <span class="mi">3</span><span class="o">:</span></div><div class='line' id='LC300'>									<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_file_partial&quot;</span><span class="p">);</span></div><div class='line' id='LC301'>								<span class="k">break</span><span class="p">;</span></div><div class='line' id='LC302'>								<span class="c1">//UPLOAD_ERR_NO_FILE</span></div><div class='line' id='LC303'>								<span class="k">case</span> <span class="mi">4</span><span class="o">:</span></div><div class='line' id='LC304'>									<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_no_file_selected&quot;</span><span class="p">);</span></div><div class='line' id='LC305'>								<span class="k">break</span><span class="p">;</span></div><div class='line' id='LC306'>								<span class="c1">//UPLOAD_ERR_NO_TMP_DIR</span></div><div class='line' id='LC307'>								<span class="k">case</span> <span class="mi">6</span><span class="o">:</span></div><div class='line' id='LC308'>									<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_no_temp_directory&quot;</span><span class="p">);</span></div><div class='line' id='LC309'>								<span class="k">break</span><span class="p">;</span></div><div class='line' id='LC310'>								<span class="c1">//UPLOAD_ERR_CANT_WRITE</span></div><div class='line' id='LC311'>								<span class="k">case</span> <span class="mi">7</span><span class="o">:</span></div><div class='line' id='LC312'>									<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_unable_to_write_file&quot;</span><span class="p">);</span></div><div class='line' id='LC313'>								<span class="k">break</span><span class="p">;</span></div><div class='line' id='LC314'>								<span class="c1">//UPLOAD_ERR_EXTENSION</span></div><div class='line' id='LC315'>								<span class="k">case</span> <span class="mi">8</span><span class="o">:</span></div><div class='line' id='LC316'>									<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_stopped_by_extension&quot;</span><span class="p">);</span></div><div class='line' id='LC317'>								<span class="k">break</span><span class="p">;</span></div><div class='line' id='LC318'>								<span class="k">default</span><span class="o">:</span></div><div class='line' id='LC319'>									<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_no_file_selected&quot;</span><span class="p">);</span></div><div class='line' id='LC320'>								<span class="k">break</span><span class="p">;</span></div><div class='line' id='LC321'>							<span class="p">}</span></div><div class='line' id='LC322'><br/></div><div class='line' id='LC323'>							<span class="c1">//Return failed upload.</span></div><div class='line' id='LC324'>							<span class="k">return</span> <span class="k">FALSE</span><span class="p">;</span></div><div class='line' id='LC325'>						<span class="p">}</span></div><div class='line' id='LC326'><br/></div><div class='line' id='LC327'>						<span class="c1">//Set current file data as class variables.</span></div><div class='line' id='LC328'>						<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_temp</span>	<span class="o">=</span> <span class="nv">$_FILES</span><span class="p">[</span><span class="nv">$field</span><span class="p">][</span><span class="s2">&quot;tmp_name&quot;</span><span class="p">][</span><span class="nv">$i</span><span class="p">];</span></div><div class='line' id='LC329'>						<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_size</span>	<span class="o">=</span> <span class="nv">$_FILES</span><span class="p">[</span><span class="nv">$field</span><span class="p">][</span><span class="s2">&quot;size&quot;</span><span class="p">][</span><span class="nv">$i</span><span class="p">];</span></div><div class='line' id='LC330'>						<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_file_mime_type</span><span class="p">(</span><span class="nv">$_FILES</span><span class="p">[</span><span class="nv">$field</span><span class="p">],</span> <span class="nv">$i</span><span class="p">);</span></div><div class='line' id='LC331'>						<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span>	<span class="o">=</span> <span class="nb">preg_replace</span><span class="p">(</span><span class="s2">&quot;/^(.+?);.*$/&quot;</span><span class="p">,</span> <span class="s2">&quot;</span><span class="se">\\</span><span class="s2">1&quot;</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span><span class="p">);</span></div><div class='line' id='LC332'>						<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span>	<span class="o">=</span> <span class="nx">strtolower</span><span class="p">(</span><span class="nx">trim</span><span class="p">(</span><span class="nb">stripslashes</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_type</span><span class="p">),</span> <span class="s1">&#39;&quot;&#39;</span><span class="p">));</span></div><div class='line' id='LC333'>						<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span>	<span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_prep_filename</span><span class="p">(</span><span class="nv">$_FILES</span><span class="p">[</span><span class="nv">$field</span><span class="p">][</span><span class="s2">&quot;name&quot;</span><span class="p">][</span><span class="nv">$i</span><span class="p">]);</span></div><div class='line' id='LC334'>						<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_ext</span>		<span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_extension</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">);</span></div><div class='line' id='LC335'>						<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">client_name</span>	<span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">;</span></div><div class='line' id='LC336'><br/></div><div class='line' id='LC337'>						<span class="c1">//Is the file type allowed to be uploaded?</span></div><div class='line' id='LC338'>						<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">is_allowed_filetype</span><span class="p">()){</span></div><div class='line' id='LC339'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_invalid_filetype&quot;</span><span class="p">);</span></div><div class='line' id='LC340'>							<span class="k">return</span> <span class="k">FALSE</span><span class="p">;</span></div><div class='line' id='LC341'>						<span class="p">}</span></div><div class='line' id='LC342'><br/></div><div class='line' id='LC343'>						<span class="c1">//If we&#39;re overriding, let&#39;s now make sure the new name and type is allowed.</span></div><div class='line' id='LC344'>						<span class="c1">//Check if a filename was supplied for the current file. Otherwise, use it&#39;s given name.</span></div><div class='line' id='LC345'>						<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_multi_file_name_override</span><span class="p">[</span><span class="nv">$i</span><span class="p">])){</span></div><div class='line' id='LC346'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_prep_filename</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_multi_file_name_override</span><span class="p">[</span><span class="nv">$i</span><span class="p">]);</span></div><div class='line' id='LC347'><br/></div><div class='line' id='LC348'>							<span class="c1">//If no extension was provided in the file_name config item, use the uploaded one.</span></div><div class='line' id='LC349'>							<span class="k">if</span><span class="p">(</span><span class="nb">strpos</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_multi_file_name_override</span><span class="p">[</span><span class="nv">$i</span><span class="p">],</span> <span class="s2">&quot;.&quot;</span><span class="p">)</span> <span class="o">===</span> <span class="k">FALSE</span><span class="p">){</span></div><div class='line' id='LC350'>								<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span> <span class="o">.=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_ext</span><span class="p">;</span></div><div class='line' id='LC351'>							<span class="c1">//An extension was provided, lets have it!</span></div><div class='line' id='LC352'>							<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC353'>								<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_ext</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_extension</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_multi_file_name_override</span><span class="p">[</span><span class="nv">$i</span><span class="p">]);</span></div><div class='line' id='LC354'>							<span class="p">}</span></div><div class='line' id='LC355'><br/></div><div class='line' id='LC356'>							<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">is_allowed_filetype</span><span class="p">(</span><span class="k">TRUE</span><span class="p">)){</span></div><div class='line' id='LC357'>								<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_invalid_filetype&quot;</span><span class="p">);</span></div><div class='line' id='LC358'>								<span class="k">return</span> <span class="k">FALSE</span><span class="p">;</span></div><div class='line' id='LC359'>							<span class="p">}</span></div><div class='line' id='LC360'>						<span class="p">}</span></div><div class='line' id='LC361'><br/></div><div class='line' id='LC362'>						<span class="c1">//Convert the file size to kilobytes.</span></div><div class='line' id='LC363'>						<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_size</span> <span class="o">&gt;</span> <span class="mi">0</span><span class="p">){</span></div><div class='line' id='LC364'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_size</span> <span class="o">=</span> <span class="nx">round</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_size</span><span class="o">/</span><span class="mi">1024</span><span class="p">,</span> <span class="mi">2</span><span class="p">);</span></div><div class='line' id='LC365'>						<span class="p">}</span></div><div class='line' id='LC366'><br/></div><div class='line' id='LC367'>						<span class="c1">//Is the file size within the allowed maximum?</span></div><div class='line' id='LC368'>						<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">is_allowed_filesize</span><span class="p">()){</span></div><div class='line' id='LC369'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_invalid_filesize&quot;</span><span class="p">);</span></div><div class='line' id='LC370'>							<span class="k">return</span> <span class="k">FALSE</span><span class="p">;</span></div><div class='line' id='LC371'>						<span class="p">}</span></div><div class='line' id='LC372'><br/></div><div class='line' id='LC373'>						<span class="c1">//Are the image dimensions within the allowed size?</span></div><div class='line' id='LC374'>						<span class="c1">//Note: This can fail if the server has an open_basdir restriction.</span></div><div class='line' id='LC375'>						<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">is_allowed_dimensions</span><span class="p">()){</span></div><div class='line' id='LC376'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_invalid_dimensions&quot;</span><span class="p">);</span></div><div class='line' id='LC377'>							<span class="k">return</span> <span class="k">FALSE</span><span class="p">;</span></div><div class='line' id='LC378'>						<span class="p">}</span></div><div class='line' id='LC379'><br/></div><div class='line' id='LC380'>						<span class="c1">//Sanitize the file name for security.</span></div><div class='line' id='LC381'>						<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">clean_file_name</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">);</span></div><div class='line' id='LC382'><br/></div><div class='line' id='LC383'>						<span class="c1">//Truncate the file name if it&#39;s too long</span></div><div class='line' id='LC384'>						<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">max_filename</span> <span class="o">&gt;</span> <span class="mi">0</span><span class="p">){</span></div><div class='line' id='LC385'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">limit_filename_length</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">max_filename</span><span class="p">);</span></div><div class='line' id='LC386'>						<span class="p">}</span></div><div class='line' id='LC387'><br/></div><div class='line' id='LC388'>						<span class="c1">//Remove white spaces in the name</span></div><div class='line' id='LC389'>						<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">remove_spaces</span> <span class="o">==</span> <span class="k">TRUE</span><span class="p">){</span></div><div class='line' id='LC390'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span> <span class="o">=</span> <span class="nb">preg_replace</span><span class="p">(</span><span class="s2">&quot;/\s+/&quot;</span><span class="p">,</span> <span class="s2">&quot;_&quot;</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">);</span></div><div class='line' id='LC391'>						<span class="p">}</span></div><div class='line' id='LC392'><br/></div><div class='line' id='LC393'>						<span class="cm">/* Validate the file name</span></div><div class='line' id='LC394'><span class="cm">						 * This function appends an number onto the end of</span></div><div class='line' id='LC395'><span class="cm">						 * the file if one with the same name already exists.</span></div><div class='line' id='LC396'><span class="cm">						 * If it returns false there was a problem.</span></div><div class='line' id='LC397'><span class="cm">						 */</span></div><div class='line' id='LC398'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">orig_name</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">;</span></div><div class='line' id='LC399'>							<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">overwrite</span> <span class="o">==</span> <span class="k">FALSE</span><span class="p">){</span></div><div class='line' id='LC400'>								<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_filename</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">upload_path</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">);</span></div><div class='line' id='LC401'>								<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span> <span class="o">===</span> <span class="k">FALSE</span><span class="p">){</span></div><div class='line' id='LC402'>									<span class="k">return</span> <span class="k">FALSE</span><span class="p">;</span></div><div class='line' id='LC403'>								<span class="p">}</span></div><div class='line' id='LC404'>							<span class="p">}</span></div><div class='line' id='LC405'><br/></div><div class='line' id='LC406'>						<span class="cm">/* Run the file through the XSS hacking filter</span></div><div class='line' id='LC407'><span class="cm">						 * This helps prevent malicious code from being</span></div><div class='line' id='LC408'><span class="cm">						 * embedded within a file.  Scripts can easily</span></div><div class='line' id='LC409'><span class="cm">						 * be disguised as images or other file types.</span></div><div class='line' id='LC410'><span class="cm">						 */</span></div><div class='line' id='LC411'>							<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">xss_clean</span><span class="p">){</span></div><div class='line' id='LC412'>								<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">do_xss_clean</span><span class="p">()</span> <span class="o">===</span> <span class="k">FALSE</span><span class="p">){</span></div><div class='line' id='LC413'>									<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_unable_to_write_file&quot;</span><span class="p">);</span></div><div class='line' id='LC414'>									<span class="k">return</span> <span class="k">FALSE</span><span class="p">;</span></div><div class='line' id='LC415'>								<span class="p">}</span></div><div class='line' id='LC416'>							<span class="p">}</span></div><div class='line' id='LC417'><br/></div><div class='line' id='LC418'>						<span class="cm">/* Move the file to the final destination</span></div><div class='line' id='LC419'><span class="cm">						 * To deal with different server configurations</span></div><div class='line' id='LC420'><span class="cm">						 * we&#39;ll attempt to use copy() first.  If that fails</span></div><div class='line' id='LC421'><span class="cm">						 * we&#39;ll use move_uploaded_file().  One of the two should</span></div><div class='line' id='LC422'><span class="cm">						 * reliably work in most environments</span></div><div class='line' id='LC423'><span class="cm">						 */</span></div><div class='line' id='LC424'>							<span class="k">if</span><span class="p">(</span><span class="o">!@</span><span class="nb">copy</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_temp</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">upload_path</span><span class="o">.</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">)){</span></div><div class='line' id='LC425'>								<span class="k">if</span><span class="p">(</span><span class="o">!@</span><span class="nb">move_uploaded_file</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_temp</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">upload_path</span><span class="o">.</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">)){</span></div><div class='line' id='LC426'>									<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_error</span><span class="p">(</span><span class="s2">&quot;upload_destination_error&quot;</span><span class="p">);</span></div><div class='line' id='LC427'>									<span class="k">return</span> <span class="k">FALSE</span><span class="p">;</span></div><div class='line' id='LC428'>								<span class="p">}</span></div><div class='line' id='LC429'>							<span class="p">}</span></div><div class='line' id='LC430'><br/></div><div class='line' id='LC431'>						<span class="cm">/* Set the finalized image dimensions</span></div><div class='line' id='LC432'><span class="cm">						 * This sets the image width/height (assuming the</span></div><div class='line' id='LC433'><span class="cm">						 * file was an image).  We use this information</span></div><div class='line' id='LC434'><span class="cm">						 * in the &quot;data&quot; function.</span></div><div class='line' id='LC435'><span class="cm">						 */</span></div><div class='line' id='LC436'>							<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_image_properties</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">upload_path</span><span class="o">.</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file_name</span><span class="p">);</span></div><div class='line' id='LC437'><br/></div><div class='line' id='LC438'>						<span class="c1">//Set current file data to multi_file_upload_data.</span></div><div class='line' id='LC439'>						<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">set_multi_upload_data</span><span class="p">();</span></div><div class='line' id='LC440'>					<span class="p">}</span></div><div class='line' id='LC441'><br/></div><div class='line' id='LC442'>					<span class="c1">//Return all file upload data.</span></div><div class='line' id='LC443'>					<span class="k">return</span> <span class="k">TRUE</span><span class="p">;</span></div><div class='line' id='LC444'>			<span class="p">}</span></div><div class='line' id='LC445'>		<span class="p">}</span></div></pre></div></td>
          </tr>
        </table>
  </div>

  </div>
</div>

<a href="#jump-to-line" rel="facebox[.linejump]" data-hotkey="l" class="js-jump-to-line" style="display:none">Jump to Line</a>
<div id="jump-to-line" style="display:none">
  <form accept-charset="UTF-8" class="js-jump-to-line-form">
    <input class="linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" autofocus>
    <button type="submit" class="button">Go</button>
  </form>
</div>

        </div>

      </div><!-- /.repo-container -->
      <div class="modal-backdrop"></div>
    </div><!-- /.container -->
  </div><!-- /.site -->


    </div><!-- /.wrapper -->

      <div class="container">
  <div class="site-footer">
    <ul class="site-footer-links right">
      <li><a href="https://status.github.com/">Status</a></li>
      <li><a href="http://developer.github.com">API</a></li>
      <li><a href="http://training.github.com">Training</a></li>
      <li><a href="http://shop.github.com">Shop</a></li>
      <li><a href="/blog">Blog</a></li>
      <li><a href="/about">About</a></li>

    </ul>

    <a href="/">
      <span class="mega-octicon octicon-mark-github" title="GitHub"></span>
    </a>

    <ul class="site-footer-links">
      <li>&copy; 2014 <span title="0.03331s from github-fe118-cp1-prd.iad.github.net">GitHub</span>, Inc.</li>
        <li><a href="/site/terms">Terms</a></li>
        <li><a href="/site/privacy">Privacy</a></li>
        <li><a href="/security">Security</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
  </div><!-- /.site-footer -->
</div><!-- /.container -->


    <div class="fullscreen-overlay js-fullscreen-overlay" id="fullscreen_overlay">
  <div class="fullscreen-container js-fullscreen-container">
    <div class="textarea-wrap">
      <textarea name="fullscreen-contents" id="fullscreen-contents" class="fullscreen-contents js-fullscreen-contents" placeholder="" data-suggester="fullscreen_suggester"></textarea>
    </div>
  </div>
  <div class="fullscreen-sidebar">
    <a href="#" class="exit-fullscreen js-exit-fullscreen tooltipped tooltipped-w" aria-label="Exit Zen Mode">
      <span class="mega-octicon octicon-screen-normal"></span>
    </a>
    <a href="#" class="theme-switcher js-theme-switcher tooltipped tooltipped-w"
      aria-label="Switch themes">
      <span class="octicon octicon-color-mode"></span>
    </a>
  </div>
</div>



    <div id="ajax-error-message" class="flash flash-error">
      <span class="octicon octicon-alert"></span>
      <a href="#" class="octicon octicon-remove-close close js-ajax-error-dismiss"></a>
      Something went wrong with that request. Please try again.
    </div>

  </body>
</html>

