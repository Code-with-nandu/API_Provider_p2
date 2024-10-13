#!/bin/bash

# Define the README file
README="README.md"

# Get the current date
CURRENT_DATE=$(date +"%Y-%m-%d")

# Update the Last Updated section
sed -i.bak "s/^## Last Updated.*/## Last Updated\n- Date: $CURRENT_DATE/" "$README"

# Optional: remove the backup file created by sed
rm "$README.bak"
