@extends('layouts.master')

@section('content')
    <article>
        <h1>Welcome to #darkshare</h1>

        <p class="lead">
            Hopefully, a place where all kinds of people can share stuff.
        </p>

        <p>
            <a class="btn btn-success" href="{{ route('snippets.create') }}">Create Snippet</a>
            <a class="btn btn-primary" href="{{ route('files.create') }}">Create File</a>
            <a class="btn btn-success" href="{{ route('urls.create') }}">Create URL</a>
        </p>

        <hr/>

        <h2>What is #darkshare?</h2>

        <p>
            It is a service that let's you share stuff. Simple as that. <br/>
            Although, since I'm maintaining this on my spare time and from my own wallet,
            I've had the need to restrict some parts of the service. I.e. you can only share files <= 6 megabytes. <br/>
            I know, it sucks.
        </p>

        <hr/>

        <h2>Can I use this for bad things?</h2>

        <p>
            Well, sure you can. <br/>
            <strong>BUT NOTICE</strong>, if I get a complaint against something you darksharers put up on here, I am
            entitled to put it down immidiately, without noticing you. Or, probably I'll tell everyone that you've been a
            bad boy.
            <br/>
            <em>(Worst case senario I'll have to block your user, and destroy your associated content,
                <strong>forever</strong>).</em>
        </p>

        <hr/>

        <h2>Can you add/fix this?</h2>

        <p>
            Yes I can! <br/>
            If you're awesome, please go to my <a href="https://github.com/jstoone/darkshare/issues">Github issues</a>
            and submit your feature or bug. That would be nice!
        </p>

        <p>
            If that's a bit too much you can always email me. Let's do some manual obfuscating:
<code>
<pre>
&lt;?php
    $username = "jstoone";
    $seperator = "@";
    $provider = "drk";
    $domain = ".sh";

    $email = $username . $seperator . $provider . $domain
?&gt;
</pre>
</code>

            Got it?
        </p>
    </article>
@stop
