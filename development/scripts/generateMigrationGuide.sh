#!/bin/bash -e

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

if [ -z "$1" ] || [ -z "$2" ] || [ -z "$3" ] || [ -z "$4" ]; then
  echo 'Usage error: Pass the targeted eclipse version, the two previous versions and the targeted SimRel as arguments'
  echo 'For example: scripts/generatePortingGuide.sh 4.41 4.40 4.39 2026-09'
  exit 1
fi
# Previous version might not always just be the minor version decremented
eclipseVersion="$1"

"$(dirname $0)/generateFromPreviousRelease.sh" "porting/eclipse_${eclipseVersion//./_}_porting_guide.html" "$1" "$2" "$3" "$4"
