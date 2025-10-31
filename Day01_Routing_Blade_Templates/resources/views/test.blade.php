@php
    $user = "Vikas Singh";
    $fruits = ["Apple","Orange","Banana","Grapes"];
@endphp
<script>
    var data = @json($fruits);
    console.log(data);
</script>
@push('name')
    
@endpush