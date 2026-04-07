<select name="current_status">
    @foreach(['Ordered','In Process','In Route','Delivered'] as $status)
        <option value="{{ $status }}" {{ $order->current_status === $status ? 'selected' : '' }}>
            {{ $status }}
        </option>
    @endforeach
</select>

{{-- Show photo upload only for In Route or Delivered --}}
<div id="photo-upload" style="display:none;">
    <label>Upload Evidence Photo:</label>
    <input type="file" name="evidence_photo" accept="image/*" capture="environment">
</div>

<script>
document.querySelector('[name=current_status]').addEventListener('change', function() {
    const show = ['In Route', 'Delivered'].includes(this.value);
    document.getElementById('photo-upload').style.display = show ? 'block' : 'none';
});
</script>