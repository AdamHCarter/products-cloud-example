<div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" id="name" name="name" value="{{old('name', $product->name)}}">
</div>
<div class="form-group">
  <label for="price">Price</label>
  <input type="text" class="form-control" id="price" name="price" value="{{old('price', $product->price)}}">
</div>
<div class="form-group">
  <label for="description">Description</label>
  <input type="text" class="form-control" id="description" name="description" value="{{old('description', $product->description)}}">
</div>
<div class="form-group">
  <label for="item_number">Product #</label>
  <input type="text" class="form-control" id="item_number" name="item_number" value="{{old('item_number', $product->item_number)}}">
</div>
<div class="form-group">
  <label for="image">Image URL</label>
  <input type="text" class="form-control" id="image" name="image" value="{{old('image', $product->image)}}">
</div>