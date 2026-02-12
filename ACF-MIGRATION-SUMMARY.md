# ACF Migration to JSON/PHP - Complete ✓

**Date:** February 12, 2026
**Theme:** ebca-theme

## What Was Done

All ACF field groups, custom post types, and taxonomies have been successfully exported from the database to JSON and PHP files in your theme directory.

### ✓ Field Groups Exported to JSON (5 total)

Located in: `/wp-content/themes/ebca-theme/acf-json/`

1. **Collection fields** (`group_64c25d318a6f1.json`)
   - Flexible Content field

2. **Homepage Fields** (`group_64c1ba294429b.json`)
   - Background Images (repeater)
   - Heading One, Two (text)
   - Button Text, URL (text, page_link)
   - Fine Print (text)

3. **Issue fields** (`group_695d5d7127bc3.json`)
   - Number (number)
   - Guest (text)
   - Kit Link (url)
   - Images (repeater)

4. **Photographer fields** (`group_695e6e9153181.json`)
   - Name (text)
   - Is me (true_false)
   - Bio (wysiwyg)
   - Links (repeater)

5. **Site Options** (`group_64c1b21c4c024.json`)
   - Instagram URL (url)
   - Contact Email (email)
   - Image New in Days (number)

### ✓ Custom Post Types Exported to PHP (3 total)

Located in: `/wp-content/themes/ebca-theme/inc/custom-post-types/`

1. **collection.php** - Collections post type
2. **issue.php** - Issues post type
3. **photographer.php** - Photographers post type

### ✓ Functions Updated

Updated `/wp-content/themes/ebca-theme/functions.php` to:

- Enable ACF Local JSON (automatic sync with `/acf-json/`)
- Load all custom post type files
- Register ACF Options Page for "Site Options"

## How It Works Now

### Field Groups (ACF Local JSON)

**ACF PRO's Local JSON feature is now active:**

- ✅ **Any changes you make in the ACF GUI** will automatically save to the JSON files
- ✅ **Field groups load from JSON files** instead of the database
- ✅ **Version control friendly** - JSON files can be committed to git
- ✅ **Easy deployment** - Just sync the files to other environments

**How to use:**

1. Edit field groups in WordPress admin as usual
2. ACF automatically updates the JSON files when you save
3. In the ACF GUI, you'll see "Sync available" if JSON differs from database
4. Click "Sync" to update database from JSON files (useful after git pull)

### Custom Post Types (PHP)

**Custom post types now load from PHP files:**

- ✅ **Version controlled** - Files are in your theme
- ✅ **Easy to modify** - Edit the PHP files directly or via GUI
- ✅ **No database dependency** - Portable across environments

**Important:** If you want to modify post type settings:
- **Option 1:** Edit the PHP files directly in `/inc/custom-post-types/`
- **Option 2:** Keep using ACF's Post Type UI (changes won't auto-sync to PHP)

## What About Your Existing Data?

**✅ ALL YOUR DATA IS SAFE AND UNCHANGED**

- All photographer content ✓
- All issue content ✓
- All collection content ✓
- All homepage fields ✓
- All site options ✓

**Only the structure/definitions moved** - the actual data remains in the database (`wp_postmeta`) and is automatically connected via field keys.

## What You Should Do Next (Optional)

### 1. Remove Database Field Groups (Recommended)

Since your field groups are now in JSON files, you can safely remove them from the database to avoid confusion:

**In WordPress Admin:**
- Go to **Custom Fields > Field Groups**
- Look for field groups with "Sync available" badge
- These are the database versions - ACF is now using the JSON versions
- You can delete the database versions if you want (optional)

**Or via WP-CLI:**
```bash
# This will remove the database copies (JSON files remain)
wp post delete 338 320 37 18 8 --force --path=/Users/eric/Sites/ericbusch-ca
```

### 2. Remove ACF Post Type UI (Optional)

Since post types are now in PHP files, you can optionally disable ACF's post type creation feature:

**In WordPress Admin:**
- Go to **ACF > Post Types**
- You'll still see the post types there
- You can leave them or delete them - your PHP files take precedence

### 3. Commit to Version Control

```bash
git add wp-content/themes/ebca-theme/acf-json/
git add wp-content/themes/ebca-theme/inc/custom-post-types/
git add wp-content/themes/ebca-theme/functions.php
git commit -m "Move ACF configuration to JSON/PHP files"
```

## Directory Structure

```
ebca-theme/
├── acf-json/                           # ACF Local JSON (auto-synced)
│   ├── group_64c1b21c4c024.json       # Site Options
│   ├── group_64c1ba294429b.json       # Homepage Fields
│   ├── group_64c25d318a6f1.json       # Collection fields
│   ├── group_695d5d7127bc3.json       # Issue fields
│   └── group_695e6e9153181.json       # Photographer fields
│
├── inc/
│   ├── acf/                            # Empty - ready for ACF PHP includes
│   └── custom-post-types/
│       ├── collection.php
│       ├── issue.php
│       └── photographer.php
│
└── functions.php                       # Updated with ACF config

```

## Testing Checklist

- [x] Field groups load from JSON (5 field groups detected)
- [x] Custom post types registered via PHP (collection, issue, photographer)
- [x] Site Options page accessible
- [x] Rewrite rules flushed
- [x] All existing data intact

## Benefits

✅ **Version Control** - All ACF configuration is now in files
✅ **Team Collaboration** - Easy to track changes via git
✅ **Deployment** - Simple sync across environments
✅ **Backup** - Configuration is part of your theme
✅ **Performance** - Slight improvement (fewer DB queries)
✅ **Flexibility** - Can modify via GUI or code

## Need Help?

If you see any issues:
1. Check that all field groups show up in ACF admin
2. Verify your post types appear in admin menu
3. Test that existing content displays correctly
4. Check for any PHP errors in debug.log

All your data is safe - this migration only moved the structure, not the content!
