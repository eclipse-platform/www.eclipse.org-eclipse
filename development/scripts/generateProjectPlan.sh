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
  echo 'Usage error: Pass the targeted eclipse version, the two previous versions, the targeted SimRel and the release events as arguments'
  echo 'For example: scripts/generateProjectPlan.sh 4.41 4.40 4.39 2026-09 '"'"'[{"name":"4.41","date":"2026-09-09"},{"name":"4.41 RC2","date":"2026-08-28"},{"name":"4.41 RC1","date":"2026-08-21"},{"name":"4.41 M3","date":"2026-08-14"},{"name":"4.41 M2","date":"2026-07-24"},{"name":"4.41 M1","date":"2026-07-03"}]'"'"''
  exit 1
fi
# Previous version might not always just be the minor version decremented
eclipseVersion="$1"
releaseEventDates="$5"

planFile="plans/eclipse_project_plan_${eclipseVersion//./_}.xml"
"$(dirname $0)/generateFromPreviousRelease.sh" "${planFile}" "$1" "$2" "$3" "$4"

# Loop over the release events with their respective name and date
jq --raw-output '.[] | [.name, .date] | @tsv' <<< "$releaseEventDates" | while IFS=$'\t\r\n' read -r name date; do
  if [[ "${name}" == "${eclipseVersion}" ]]; then
    kind='GA'
  else
    kind=${name#${eclipseVersion} }
  fi
  echo "Update event $name scheduled at $date"
  sed -i "/milestone=\"${kind}\"/ s/date=\"[^\"]*\"/date=\"${date}\"/" "${planFile}"
done
