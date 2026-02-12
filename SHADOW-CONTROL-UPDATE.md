# Collection Image Shadow Control - Implementation Summary

**Date:** February 12, 2026

## What Was Added

Added two-level control for image shadows in Collections:

### 1. Collection-Level Control (Gallery Layout)
- **Field Name:** `disable_shadows_all`
- **Type:** True/False (checkbox with UI toggle)
- **Label:** "Disable shadows for all images"
- **Instructions:** "Check to remove shadows from all images in this gallery. Individual images can still override this setting."
- **Default:** No (shadows enabled)

### 2. Individual Image Control (Repeater Field)
- **Field Name:** `disable_shadow`
- **Type:** True/False (checkbox with UI toggle)
- **Label:** "Disable shadow"
- **Instructions:** "Check to remove shadow from this image."
- **Default:** No (shadow enabled)

## How It Works

**Priority Logic (Individual settings override collection-level):**

1. ✅ **Individual image has "Disable shadow" = Yes**
   → No shadow (regardless of collection setting)

2. ⬜ **Individual image has "Disable shadow" = No/Not Set**
   → Check collection-level setting:
   - If collection "Disable shadows for all" = Yes → No shadow
   - If collection "Disable shadows for all" = No → Show shadow (default)

## Files Modified

### 1. ACF Field Group JSON
**File:** `acf-json/group_64c25d318a6f1.json`

Added two new fields:
- `field_67ac1234567a0` - Collection-level shadow control
- `field_67ac1234567a1` - Individual image shadow control

### 2. Single Collection Template
**File:** `single-collection.php`

Updated to pass shadow settings to template part:
```php
$images              = get_sub_field( 'images' );
$disable_shadows_all = get_sub_field( 'disable_shadows_all' );

get_template_part( 'template-parts/collection-flexible-content', 'gallery', [
    'attachment_ids'      => $attachment_ids,
    'images_data'         => $images,
    'disable_shadows_all' => $disable_shadows_all,
] );
```

### 3. Gallery Template Part
**File:** `template-parts/collection-flexible-content-gallery.php`

Added shadow logic:
- Creates map of attachment_id → disable_shadow setting
- Checks individual and collection-level settings
- Conditionally adds `shadow` class to images
- Removed hardcoded `shadow` class from base attributes

## What You Need to Do

### ⚠️ IMPORTANT: Sync ACF Fields in WordPress Admin

Since we modified the JSON file directly, you need to sync the fields in WordPress:

1. **Go to:** WordPress Admin → Custom Fields → Field Groups
2. **Look for:** "Collection fields" with a **"Sync available"** badge
3. **Click:** The "Sync" link
4. **Confirm:** Click "Sync" button

This will update the database to match the JSON file.

### Testing Your New Controls

1. **Edit a Collection** in WordPress admin
2. **Add or edit a Gallery** layout
3. **You'll see:**
   - New checkbox above images: "Disable shadows for all images"
   - New column in images table: "Disable shadow"

**Test scenarios:**

✅ **Default behavior** - All images have shadows (current behavior maintained)

✅ **Disable all shadows**
- Check "Disable shadows for all images"
- Save → All images in that gallery have no shadows

✅ **Disable individual image**
- Leave "Disable shadows for all" unchecked
- Check "Disable shadow" for specific images
- Save → Only those images have no shadows

✅ **Individual override**
- Check "Disable shadows for all images"
- Uncheck "Disable shadow" for specific images
- Save → All images have no shadows (individual setting doesn't enable, only disables)

## Shadow CSS Classes

**What's affected:**
- ✅ Image shadow: `shadow` class on `<img>` tag
- ⬜ Link wrapper shadow: `sm:shadow` class (unchanged - still applies)

**Why only image shadow:**
Per user request, only the image shadow is controlled. The container/link shadow (`sm:shadow`) remains unchanged to maintain the white background effect on hover.

## Backwards Compatibility

✅ **Existing collections are unaffected**
- Default value is `false` (shadows enabled)
- All existing images will continue to show shadows
- No manual updates needed for existing content

## Next Steps

1. Sync ACF fields in admin (see above)
2. Test on a collection
3. Update any collections where you want to remove shadows
4. Optionally commit changes to git:
   ```bash
   git add acf-json/ single-collection.php template-parts/
   git commit -m "Add shadow control for collection images"
   ```
