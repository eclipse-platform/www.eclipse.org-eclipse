#!/bin/bash -e
set -o pipefail

#******************************************************************************
# Copyright (c) 2026 Hannes Wellmann and others.
#
# This program and the accompanying materials
# are made available under the terms of the Eclipse Public License 2.0
# which accompanies this distribution, and is available at
# https://www.eclipse.org/legal/epl-2.0/
#
# SPDX-License-Identifier: EPL-2.0
#
# Contributors:
#     Hannes Wellmann - initial API and implementation
#******************************************************************************

if [ -z "$1" ] || [ -z "$2" ] || [ -z "$3" ] || [ -z "$4" ] || [ -z "$5" ]; then
  echo 'Usage error: Pass the targeted eclipse version, the two previous versions and the targeted SimRel as arguments'
  echo 'For example: scripts/generateFromPreviousRelease.sh previousFile.txt 4.41 4.40 4.39 2026-09'
  exit 1
fi
# Previous versions might not always just be the minor version decremented
newFile="$1"
eclipseVersion="$2"
previousEclipseVersion="$3"
previouspreviousEclipseVersion="$4"
simRel="$5"

previousFile=$(echo "${newFile}" \
  | sed "s/${eclipseVersion//./\\.}/${previousEclipseVersion}/g" \
  | sed "s/${eclipseVersion//./_}/${previousEclipseVersion//./_}/g")

cp -v "${previousFile}" "${newFile}"

# Update strings like 4.41 and escape the dot to match it literally too
echo "Update version to ${eclipseVersion} respectively ${eclipseVersion//./_} and the previous version to ${previousEclipseVersion}"
sed --in-place "s/${previousEclipseVersion//./\\.}/${eclipseVersion}/g" "${newFile}"
sed --in-place "s/${previousEclipseVersion//./_}/${eclipseVersion//./_}/g" "${newFile}"
sed --in-place "s/${previouspreviousEclipseVersion//./\\.}/${previousEclipseVersion}/g" "${newFile}"

# Update SimRel mentionings
echo "Update SimRel to ${simRel}"
sed --in-place --regexp-extended "s/([0-9]{4}-[0-9]{2})([^-]|$)/${simRel}\2/g" "${newFile}"

# Update Last revised date
export LC_ALL=C
today=$(date +'%B %-d, %Y')
echo "Update last revised date to ${today}"
sed --in-place --regexp-extended "s|Last revised [a-zA-Z]+ [0-9]{1,2}, [0-9]{4}|Last revised ${today}|g" "${newFile}"
