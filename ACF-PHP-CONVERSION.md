# ACF Conversion: JSON → PHP - Complete ✓

**Date:** February 12, 2026

## What Changed

Converted all ACF field groups from JSON files to PHP registration.

### Before (JSON)
```
acf-json/
├── group_64c25d318a6f1.json  (Collection fields)
├── group_64c1ba294429b.json  (Homepage Fields)
├── group_64c25d318a6f1.json  (Issue fields)
├── group_695e6e9153181.json  (Photographer fields)
└── group_64c1b21c4c024.json  (Site Options)
```

### After (PHP)
```
inc/acf/
└── field-groups.php  (All 5 field groups)
```

## Files Modified

### 1. New File: `inc/acf/field-groups.php`
- Contains all 5 field groups registered via `acf_add_local_field_group()`
- Auto-generated from existing JSON data
- Clean, readable PHP arrays

### 2. Updated: `functions.php`
**Removed:**
```php
// ACF Local JSON filters (no longer needed)
add_filter( 'acf/settings/save_json', ... );
add_filter( 'acf/settings/load_json', ... );
```

**Added:**
```php
// Load ACF field groups
require_once get_template_directory() . '/inc/acf/field-groups.php';
```

### 3. Removed
- ✅ `/acf-json/` directory (all JSON files deleted)
- ✅ Temporary export script

## Verification

All 5 field groups loading correctly:
```
✓ Collection fields (local: php)
✓ Homepage Fields (local: php)
✓ Issue fields (local: php)
✓ Photographer fields (local: php)
✓ Site Options (local: php)
```

## Your Content - UNCHANGED ✓

Just like promised:
- ✅ All photographer content intact
- ✅ All issue content intact
- ✅ All collection content intact
- ✅ All homepage fields intact
- ✅ All site options intact

**Field keys unchanged** → All data connections preserved.

## How It Works Now

### In WordPress Admin

**Field groups are READ-ONLY in the GUI:**
- You can VIEW field groups in Custom Fields admin
- You can VIEW field settings
- You CANNOT edit via GUI (grayed out)
- To make changes: Edit `/inc/acf/field-groups.php` directly

**Why read-only?**
- Prevents accidental changes in GUI
- Enforces code-based workflow
- Changes must go through version control
- More professional/maintainable

### Making Changes

**To modify field groups:**

1. **Edit the PHP file:**
   ```php
   // inc/acf/field-groups.php
   acf_add_local_field_group( array(
       'key' => 'group_64c25d318a6f1',
       'title' => 'Collection fields',
       'fields' => array(
           // Edit fields here
       ),
   ) );
   ```

2. **Save the file** - Changes take effect immediately

3. **Commit to git** - Your changes are version controlled

**To add new fields:**
- Option 1: Create in GUI temporarily, export to PHP, delete from GUI
- Option 2: Copy existing field structure and modify in PHP
- Option 3: Use ACF GUI to generate, then sync to PHP

## Benefits of PHP Over JSON

✅ **Code-based workflow** - All changes in version control
✅ **Read-only in GUI** - Prevents accidental changes
✅ **Better diffs** - Easier to review changes in PRs
✅ **Inline documentation** - Can add PHP comments
✅ **More explicit** - Clear what fields exist
✅ **WordPress standards** - Follows WP coding practices
✅ **No sync needed** - No "sync available" badges to click

## Directory Structure

```
ebca-theme/
├── inc/
│   ├── acf/
│   │   └── field-groups.php          # All field groups (NEW)
│   └── custom-post-types/
│       ├── collection.php
│       ├── issue.php
│       └── photographer.php
└── functions.php                      # Updated to load PHP fields
```

## What About Shadow Control?

✅ **All shadow settings preserved:**
- Collection-level: "Disable shadows for all images" field
- Individual image: "Disable shadow" field
- Both fields are in the PHP file
- All functionality still works

## Testing Checklist

- [x] All 5 field groups load correctly
- [x] Fields appear in WordPress admin (read-only)
- [x] Existing content displays correctly
- [x] Shadow control still works
- [x] No PHP errors in debug.log
- [x] Custom post types still registered

## Maintenance Notes

### Editing Field Groups

Fields are now code-based. To add/modify:

1. Open `inc/acf/field-groups.php`
2. Find the field group array
3. Modify the PHP array structure
4. Save and test

### Field Array Structure

Each field follows this pattern:
```php
array(
    'key' => 'field_xxxxx',     // Unique field key
    'label' => 'Field Label',   // Display label
    'name' => 'field_name',     // Database name
    'type' => 'text',           // Field type
    'instructions' => '',       // Help text
    'required' => 0,            // Required (1/0)
    // ... other settings
)
```

### Common Field Types

- `text` - Single line text
- `textarea` - Multi-line text
- `wysiwyg` - Rich text editor
- `image` - Image upload
- `true_false` - Checkbox
- `number` - Numeric input
- `url` - URL input
- `email` - Email input
- `date_picker` - Date selector
- `repeater` - Repeating fields
- `flexible_content` - Flexible layouts

## Rollback (If Needed)

If you need to go back to JSON for any reason:

1. Restore `/acf-json/` directory from git
2. Re-add JSON filters to `functions.php`
3. Remove `require_once` for `field-groups.php`
4. Delete or keep `inc/acf/field-groups.php`

**But you won't need to** - PHP is the better approach! ✨

## Summary

✅ **Conversion complete and tested**
✅ **All content intact**
✅ **Fields now code-based**
✅ **More maintainable and professional**
✅ **Follows WordPress coding standards**

Your ACF setup is now fully version-controlled and code-based! 🚀
