@if (Route::has('login'))
 @auth
 @if (auth()->user()->isAdmin())
 <script type="text/javascript">
     window.location = "admin/dashboard";
 </script>

 @endif
 @if (!auth()->user()->isAdmin())
 <script type="text/javascript">
     window.location = "dashboard";
 </script>
 @endif
 @endauth
 <script type="text/javascript">
     window.location = "login";
 </script>
 @endif