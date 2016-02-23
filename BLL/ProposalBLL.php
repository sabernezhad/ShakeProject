<?php
/*
 *  create class
 */
class ProposalBLL {
	
	/*
	 * create variable
	 */
	
	var $proposal;
	var $SendProposal;
	var $role;
	var $GetProposalByRoleId;
	var $reciever;
	var $GetAllProposalsByReciever;
	var $DeleteProposal;
	
	/*
	 * create construction
	 */
	
	public function ProposalBLL() {
		
		/*
		 * create object from Proposal()
		 */
		
		$this->proposal = new Proposal ();
		
		$this->SendProposal = new ProposalDAL ();
		$this->role = new Role ();
		$this->GetProposalByRoleId = new ProposalDAL ();
		$this->reciever = new User ();
		$this->GetAllProposalsByReciever = new ProposalDAL ();
		
		$this->DeleteProposal = new ProposalDAL ();
		
		$proposals = GetAllProposalsByReciever ( $reciever );
	
	}
	
	function SendProposal($proposal) /*ÇÑÓÇá íÔäåÇÏ */  
{
		
		$result = $SendProposal->SendProposal ( $proposal );
		
		return $result;
	
	}
	
	function GetProposalByRoleId($role)
 /*


ÊÇÈÚ ÏÑíÇÝÊ �íÔäåÇÏ  */ 
{
		
		$result = $GetProposalByRoleId->GetProposalByRoleId ( $role );
		
		return $result;
	
	}
	
	function GetAllProposalsByReciever($reciever)/* Reciever Úãá �ÑÝÊä åãå �íÔäåÇÏÇÊ ÊæÓØ  */  
{
		
		$result = $GetAllProposalsByReciever->GetAllProposalsByReciever ( $reciever );
		
		return $result;
	
	}
	
	function DeleteProposal($proposal) /*Úãá ÍÐÝ �íÔäåÇÏ*/ 
{
		
		$result = $DeleteProposal->DeleteProposal ( $proposal );
		
		return $result;
	
	}
	
	function SortProposal($proposals)  /*ãÑÊÈ ÓÇÒí �íÔäåÇÏ */
{
		sort ( $proposals );
		return $proposals;
	
	}

}
?> 