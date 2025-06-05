#!/bin/sh -e

#******************************************************************************
# Copyright (c) 2019, 2025 IBM Corporation and others.
#
# This program and the accompanying materials
# are made available under the terms of the Eclipse Public License 2.0
# which accompanies this distribution, and is available at
# https://www.eclipse.org/legal/epl-2.0/
#
# SPDX-License-Identifier: EPL-2.0
#
# Contributors:
#     IBM Corporation - initial API and implementation
#******************************************************************************

if [ "x$1" == "x"  ] || [ "x$2" == "x"  ]; then
 echo "Usage error: Pass release version and simrel release name as arguments"
 echo "For example: ./applyTemplate.sh 4.13 2019-09"
 exit 1
fi
eclipseVersion=$1
simRelVersion=$2

cd $(dirname $(readlink -f "$0"))/../../news
echo "In news directory: $(pwd)"

echo "Checking if directory ${eclipseVersion} already exists"
if [ -d ${eclipseVersion} ]; then
   echo "Error: Directory ${eclipseVersion} already exists. Exiting..."
   exit 1
fi

echo "Applying template for ${eclipseVersion}"
cp -R '4.x-template' ${eclipseVersion}

echo "Created directory and entering ${eclipseVersion}"
cd ${eclipseVersion}

echo "Replacing 4.x with ${eclipseVersion} and YYYY-MM with ${simRelVersion} to files in $(pwd)"

for file in *.md; do
  if [ -f "$file" ]; then
    sed -i --expression "s|4\.x|${eclipseVersion}|g" $file
    sed -i --expression "s|YYYY-MM|${simRelVersion}|g" $file
  fi
done
