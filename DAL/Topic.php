<?php
class TopicDAL
{
public function EditTopic($topic)
        {
        	global $db;
        	
        	$TopicID=$db->Quote($topic->topicid);  
          
            $SocietyId=$db->Quote($topic->SocietyId);
            $Title=$db->Quote($topic->Title);
            $TopicType=$db->Quote($topic->TopicType);
            $TimeCteated=$db->Quote($topic->TimeCreated);
            
            
            $db->SetQuery("UPDATE Topic SET
            ID='$TopicID',
            SocietyID='$SocietyId',
            Title='$Title',
            Type='$TopicType',
            TimeCreated='$TimeCreated'
            wWHERE ID='$topic->TopicID'
            ");
        }
} 