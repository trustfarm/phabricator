<?php

final class DiffusionCommitDraftEngine
  extends PhabricatorDraftEngine {

  protected function hasCustomDraftContent() {
    $viewer = $this->getViewer();
    $commit = $this->getObject();

    $inlines = id(new DiffusionDiffInlineCommentQuery())
      ->setViewer($viewer)
      ->withCommitPHIDs(array($commit->getPHID()))
      ->withPublishableComments(true)
      ->execute();

    return (bool)$inlines;
  }

}
