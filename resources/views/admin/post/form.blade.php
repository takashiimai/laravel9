@csrf
<input type="hidden" name="id" value="{{ $item->id }}">


<div class="mb-3 row">
    <label for="title" class="col-2 col-form-label text-end">タイトル</label>
    <div class="col-10">
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $item->title) }}">
@if ($errors->has('title'))
        <p class="text-danger my-2"><b>{{$errors->first('title')}}</b></p>
@endif
    </div>
</div>

<div class="mb-3 row">
    <label for="description" class="col-2 col-form-label text-end">内容</label>
    <div class="col-10">
        <textarea class="form-control" id="description" name="description">{{ old('description', $item->description) }}</textarea>
@if ($errors->has('description'))
        <p class="text-danger my-2"><b>{{$errors->first('description')}}</b></p>
@endif
    </div>
</div>

<div class="mb-3 row">
    <label for="image" class="col-2 col-form-label text-end">画像</label>
    <div class="col-10">
@if ($item->image)
        <img src="{{ $item->image_url }}" class="img-thumbnail" width="200">
@endif
        <input type="file" class="form-control" id="image" name="image">
@if ($errors->has('image'))
        <p class="text-danger my-2"><b>{{$errors->first('image')}}</b></p>
@endif
    </div>
</div>

<div class="mb-3 row">
    <label for="image" class="col-2 col-form-label text-end">公開状態</label>
    <div class="col-10">
@foreach ($postStatus as $_k => $_v)
        <div class="custom-control custom-checkbox">
            <input type="radio" class="custom-control-input" id="formCheck{{ $_k }}" name="status" value="{{ $_k }}" {{ $_k == old('status', $item->status) ? 'checked' : '' }}>
            <label for="formCheck{{ $_k }}" class="custom-control-label">
                {{ $_v }}
            </label>
        </div>
@endforeach
@if ($errors->has('status'))
        <p class="text-danger my-2"><b>{{$errors->first('status')}}</b></p>
@endif
    </div>
</div>

<div class="text-end">
    <a href="{{ route('admin.post.index') }}" class="btn btn-secondary">キャンセル</a>
    <button type="submit" class="btn btn-primary">送信</a>
</div>
