@if (session('success'))
    <div class="el-button el-button--success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="el-button el-button--danger">
        {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="el-button el-button--warning">
        {{ session('warning') }}
    </div>
@endif

@if (session('info'))
    <div class="el-button el-button--info">
        {{ session('info') }}
    </div>
@endif