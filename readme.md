# WordPress Bulk Remove Taxonomy Terms

## Description

This repository provides functionality to remove all terms of a specified custom taxonomy from selected posts in bulk for a custom post type in WordPress. It simplifies the management of taxonomy terms by allowing administrators to perform bulk operations directly from the WordPress admin interface.

### Key Features:
- Adds a new bulk action option in the admin posts list for a custom post type.
- Provides a user-friendly interface to confirm the bulk removal.
- Removes all terms associated with a specific custom taxonomy from the selected posts.
- Displays an admin notice confirming the successful removal of the terms.

## Installation

1. **Add PHP Code**:
   - Copy and paste the provided PHP code into your theme’s `functions.php` file or into a custom plugin.

2. **Add JavaScript File**:
   - Create a new JavaScript file named `custom-bulk-edit.js` in your theme's `js` directory.
   - Copy and paste the provided JavaScript code into `custom-bulk-edit.js`.

3. **Enqueue JavaScript**:
   - Make sure the JavaScript file is correctly enqueued by the PHP code.

## Usage

1. **Navigate to the Custom Post Type**:
   - Go to the WordPress admin dashboard.
   - Navigate to `Posts` > `All Posts` (replace `Posts` with your custom post type name).

2. **Select Posts**:
   - Select the posts you want to modify using the checkboxes.

3. **Choose the Bulk Action**:
   - From the `Bulk Actions` dropdown menu, select `Remove All [Custom Taxonomy]` (or the equivalent for your custom taxonomy).

4. **Apply the Action**:
   - Click `Apply`.
   - Confirm the action when prompted.

5. **Admin Notice**:
   - After the action is applied, you will see a notice indicating how many posts were affected.
